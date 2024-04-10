<?php

namespace Laltu\LaravelEnvato\Http\Controllers;

use Laltu\LaravelEnvato\Services\EnvironmentManager;
use Laltu\LaravelEnvato\Services\PermissionsChecker;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class InstallationController extends Controller
{

    public function showGettingStarted()
    {
        return Inertia::render('GettingStarted');
    }

    public function showServerRequirements()
    {
        $requirements = [
            'PHP >= 8.2' => version_compare(PHP_VERSION, '8.2.0', '>='),
            'BCMath PHP Extension' => extension_loaded('bcmath'),
            'Ctype PHP Extension' => extension_loaded('ctype'),
            'Fileinfo PHP Extension' => extension_loaded('fileinfo'),
            'JSON PHP Extension' => extension_loaded('json'),
            'Mbstring PHP Extension' => extension_loaded('mbstring'),
            'OpenSSL PHP Extension' => extension_loaded('openssl'),
            'PDO PHP Extension' => extension_loaded('pdo'),
            'Tokenizer PHP Extension' => extension_loaded('tokenizer'),
            'XML PHP Extension' => extension_loaded('xml'),
        ];

        return Inertia::render('ServerRequirements', ['requirements' => $requirements]);
    }

    public function showFolderPermissions(PermissionsChecker $permissionsChecker)
    {
        $permissions = $permissionsChecker->check(
            config('laravel-envato.permissions')
        );

        return Inertia::render('FolderPermissions', $permissions);
    }

    public function showEnvironmentVariables(EnvironmentManager $environmentManager)
    {
        $envVariables = $environmentManager->getEnvContent();

        return Inertia::render('EnvironmentVariables', compact('envVariables'));
    }

    public function submitEnvironmentVariables(EnvironmentManager $environmentManager)
    {
        $envVariables = $environmentManager->getEnvContent();

        return redirect()->route('install.envato-license');
    }

    public function showEnvatoLicense()
    {
        return Inertia::render('EnvatoLicense');
    }

    public function submitEnvatoLicense(Request $request)
    {
        $licenseKey = $request->input('license_key');
        $personalToken = env('ENVATO_PERSONAL_TOKEN');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $personalToken,
        ])->get('https://api.envato.com/v3/market/author/sale', ['code' => $licenseKey]);

        if ($response->successful()) {
            $data = $response->json();
            if (isset($data['item'])) {
                // Assuming successful verification
                return Inertia::render('EnvatoLicenseVerification', ['verification' => [
                    'success' => true,
                    'message' => 'License verified successfully!',
                ]]);
            }
        }

        return redirect()->route('install.installation-progress');
    }

    public function showInstallationProgress()
    {
        // Example installation steps
        try {
            // Run database migrations
            Artisan::call('migrate', ['--force' => true]);

            // Seed the database
            Artisan::call('db:seed', ['--force' => true]);

            // Perform any additional setup steps

            // Return a successful response
            return response()->json(['success' => true, 'message' => 'Installation completed successfully!']);
        } catch (\Exception $e) {
            // Handle errors and return a response
            return response()->json(['success' => false, 'message' => 'Installation failed: ' . $e->getMessage()]);
        }

        // You'll likely need to keep track of the progress in some way
        // (e.g., session, database)
        $installationProgress = [
            'step1' => true, // Completed
            'step2' => false, // In progress or not started
            // ...
        ];

        return Inertia::render('InstallationProgress', [
            'installationProgress' => $installationProgress
        ]);
    }

    // Helper function (replace with your permission check logic)
    private function isFolderWritable($folderPath)
    {
        return is_writable($folderPath);
    }
}
