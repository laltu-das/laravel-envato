<?php

namespace Laltu\LaravelEnvato\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Laltu\LaravelEnvato\Http\Requests\EnvatoLicenseRequest;
use Laltu\LaravelEnvato\Services\EnvironmentManager;
use Laltu\LaravelEnvato\Services\PermissionsChecker;
use Illuminate\Routing\Controller;
use Symfony\Component\Console\Output\BufferedOutput;

class InstallationController extends Controller
{

    public function showGettingStarted()
    {
        return inertia('GettingStarted');
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

        return inertia('ServerRequirements', ['requirements' => $requirements]);
    }

    public function showFolderPermissions(PermissionsChecker $permissionsChecker)
    {
        $permissions = $permissionsChecker->check(
            config('laravel-envato.permissions')
        );

        return inertia('FolderPermissions', $permissions);
    }

    public function showEnvironmentVariables(EnvironmentManager $environmentManager)
    {
        $envVariables = $environmentManager->getEnvContent();

        return inertia('EnvironmentVariables', compact('envVariables'));
    }

    public function submitEnvatoLicense(EnvatoLicenseRequest $request)
    {
        $response = Http::acceptJson()->post('http://localhost:8001/api/product/sunt-qui-molestiae/verify', ['code' => $request->licenseKey]);

        if ($response->successful()) {
            $data = $response->json();
            if (isset($data['token'])) {
                // Assuming successful verification
                $url = "https://support.scriptspheres.com/api/download-file/{$data['token']}";

                $response = Http::acceptJson()->get($url);

                if ($response->successful()) {
                    // Attempt to extract the filename from the Content-Disposition header
                    $contentDisposition = $response->header('Content-Disposition');
                    $filename = null;
                    if (!empty($contentDisposition)) {
                        $matches = [];
                        if (preg_match('/filename=["\']?([^"\']+)/', $contentDisposition, $matches)) {
                            $filename = $matches[1];
                        }
                    }

                    // Define the save path using the extracted or fallback filename
                    $filePath = base_path($filename);

                    // Save the file
                    file_put_contents($filePath, $response->body());
                } else {
                    echo "Failed to download the file.";
                }
            }
        }
    }

    public function showInstallationProgress()
    {
        $output = new BufferedOutput;

        Artisan::call('list', [], $output); // Example command 'list', change to your needed command

        $content = $output->fetch(); // Get the output from the buffer

        return inertia('InstallationProgress',['output' => $content]);
    }
}
