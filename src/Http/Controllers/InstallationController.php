<?php

namespace Laltu\LaravelEnvato\Http\Controllers;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Laltu\LaravelEnvato\Http\Requests\EnvatoLicenseRequest;
use Laltu\LaravelEnvato\Services\EnvironmentManager;
use Laltu\LaravelEnvato\Services\PermissionsChecker;
use Illuminate\Routing\Controller;
use Symfony\Component\Console\Output\BufferedOutput;

class InstallationController extends Controller
{
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

        return response()->json(['data' => $requirements]);
    }

    public function showFolderPermissions(PermissionsChecker $permissionsChecker)
    {
        $permissions = $permissionsChecker->check(
            config('laravel-envato.permissions')
        );

        return response()->json(['data' => $permissions]);
    }

    public function showEnvironmentVariables(EnvironmentManager $environmentManager)
    {
        $envVariables = $environmentManager->getEnvContent();

        return response()->json(['data' => $envVariables]);
    }

    /**
     * @throws ConnectionException
     */
    public function submitEnvatoLicense(EnvatoLicenseRequest $request)
    {
        $response = Http::acceptJson()->post('https://support.scriptspheres.com/api/product/sunt-qui-molestiae/verify', [
            'envatoItemId' => $request->envatoItemId,
            'licenseKey' => $request->licenseKey
        ]);

//        if ($response->successful()) {
//            $data = $response->json();
//            if (isset($data['token'])) {
//                return response()->json(['message' =>$data]);

        // Assuming successful verification
//                $url = "http://localhost:8000/api/download-file/{$data['token']}";
//
//                $response = Http::acceptJson()->get($url);
//
//                if ($response->successful()) {
//                    // Attempt to extract the filename from the Content-Disposition header
//                    $contentDisposition = $response->header('Content-Disposition');
//                    $filename = null;
//                    if (!empty($contentDisposition)) {
//                        $matches = [];
//                        if (preg_match('/filename=["\']?([^"\']+)/', $contentDisposition, $matches)) {
//                            $filename = $matches[1];
//                        }
//                    }
//
//                    // Define the save path using the extracted or fallback filename
//                    $filePath = base_path($filename);
//
//                    // Save the file
//                    file_put_contents($filePath, $response->body());
//                } else {
//                    echo "Failed to download the file.";
//                }
//            }
//        }

        return $response->json();

    }

    public function showInstallationProgress(Request $request)
    {
        $output = new BufferedOutput;

        Artisan::call('install:envato-project', ['token' => $request->token], $output);

        $content = $output->fetch();

        return response()->json(['data' => $content]);
    }
}
