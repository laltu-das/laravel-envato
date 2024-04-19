<?php

namespace Laltu\LaravelEnvato\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use ZipArchive;

class InstallEnvatoProject extends Command implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'install-project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Envato';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $code = $this->argument('code');
        if ($this->verifyPurchase($code)) {
            $this->info('Purchase verified successfully! Starting download and installation.');

            $zipPath = $this->downloadZip($code);
            if ($this->extractZip($zipPath)) {
                $this->info('Project extracted successfully.');

                $this->setUpEnvironment();
                $this->call('migrate');
                $this->info('The Envato project has been installed and configured successfully!');
            }
        } else {
            $this->error('Purchase verification failed. Please check your code and try again.');
        }
    }


    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments(): array
    {
        return [
            ['code', InputArgument::REQUIRED, 'What is your Envato purchase code'],
        ];
    }

    /**
     * Get the options for the command.
     *
     * @return array An array of options for the command.
     */
    public function getOptions(): array
    {
        return [
            ['model', 'm', InputOption::VALUE_OPTIONAL, 'The model associated with the view.'],
            ['methods', null, InputOption::VALUE_OPTIONAL, 'The methods you want to add to the service (separated by a comma)'],
            ['force', null, InputOption::VALUE_OPTIONAL, 'Create the class even if the model already exists'],
        ];
    }

    private function verifyPurchase($code): bool
    {
        $response = Http::post('http://127.0.0.1:8000/api/envato/verify', ['code' => $code]);

        return $response->successful();
    }

    private function downloadZip($code): string
    {

        $url = 'http://127.0.0.1:8000/api/download/dxffybtvDtkw29K4ImPC7whXVwFxLxnHUourwtST';

        $response = Http::get($url);

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

            $zipPath = storage_path('app/envato.zip');

            // Save the file
            file_put_contents($zipPath, fopen($response->body(), 'r'));
        } else {
            echo "Failed to download the file.";
        }

        return $zipPath;
    }

    private function extractZip($zipPath)
    {
        $zip = new ZipArchive;
        if ($zip->open($zipPath) === true) {
            $zip->extractTo(base_path());
            $zip->close();
        } else {
            $this->error('Failed to extract the project.');
        }
    }
}
