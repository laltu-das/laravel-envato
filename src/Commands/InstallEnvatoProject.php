<?php

namespace Laltu\LaravelEnvato\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use ZipArchive;

class InstallEnvatoProject extends Command implements PromptsForMissingInput
{
    protected $name = 'install:envato-project';
    protected $description = 'Downloads and installs a project from Envato given a purchase code.';

    protected string $type = 'Envato';

    /**
     * @throws ConnectionException
     */
    public function handle(): void
    {
        $token = $this->argument('token');
        $url = "https://support.scriptspheres.com/api/download/{$token}";

        $this->info("Starting the download...");
        $filename = $this->downloadFile($url);
        if ($filename) {
            $this->info('File downloaded successfully: ' . $filename);
            if ($this->extractZip($filename)) {
                $this->runSetupCommands($filename);
            }
        }
    }

    protected function getArguments(): array
    {
        return [
            ['token', InputArgument::REQUIRED, 'The Envato purchase code'],
        ];
    }

    public function getOptions(): array
    {
        return [
            ['force', null, InputOption::VALUE_OPTIONAL, 'Force the installation even if the project already exists.'],
        ];
    }

    protected function extractFilename($contentDisposition)
    {
        $matches = [];
        if (!empty($contentDisposition) && preg_match('/filename=["\']?([^"\']+)/', $contentDisposition, $matches)) {
            return $matches[1];
        }
        return null;
    }

    /**
     * @throws ConnectionException
     */
    private function downloadFile($url): ?string
    {
        $response = Http::withOptions([
            'stream' => true,
        ])->get($url);

        if ($response->successful()) {
            $contentDisposition = $response->header('Content-Disposition');
            $filename = $this->extractFilename($contentDisposition) ?? 'downloaded_file.zip';

            $filePath = base_path($filename);
            $stream = $response->getBody();

            // Open file handle to write the stream content
            $fileHandle = fopen($filePath, 'w+');
            if (false === $fileHandle) {
                $this->error('Unable to open file for writing: ' . $filePath);
                return null;
            }

            // Copy the contents of the stream to the file
            while (!$stream->eof()) {
                fwrite($fileHandle, $stream->read(1024 * 1024));  // Read and write in chunks of 1MB
            }
            fclose($fileHandle);

            return $filePath;
        } else {
            $this->error('Failed to download the file. HTTP Status: ' . $response->status());
            return null;
        }
    }

    private function extractZip($zipPath): bool
    {
        $zip = new ZipArchive;
        if ($zip->open($zipPath) === true) {
            $extractPath = base_path(); // Adjust this path as necessary
            $zip->extractTo($extractPath);
            $zip->close();
            $this->info('Project extracted successfully to: ' . $extractPath);
            return true;
        } else {
            $this->error('Failed to extract the project.');
            return false;
        }
    }

    private function runSetupCommands($filename): void
    {
        $projectDir = dirname(base_path($filename)); // Adjust based on your file path

        // Run Composer Install
        $this->info('Running Composer install...');
        exec("cd {$projectDir} && composer install", $output, $return_var);
        if ($return_var !== 0) {
            $this->error('Composer install failed.');
            return;
        }
        $this->info(implode("\n", $output));

        // Run NPM Install
        $this->info('Running NPM install...');
        exec("cd {$projectDir} && npm install", $output, $return_var);
        if ($return_var !== 0) {
            $this->error('NPM install failed.');
            return;
        }
        $this->info(implode("\n", $output));

        // Run NPM Build
        $this->info('Running NPM build...');
        exec("cd {$projectDir} && npm run build", $output, $return_var);
        if ($return_var !== 0) {
            $this->error('NPM build failed.');
            return;
        }
        $this->info(implode("\n", $output));

        // Run Laravel Migrations
        $this->info('Running Laravel migrations...');
        exec("cd {$projectDir} && php artisan migrate", $output, $return_var);
        if ($return_var !== 0) {
            $this->error('Migration failed.');
            return;
        }
        $this->info(implode("\n", $output));

        // Run Laravel DB Seed
        $this->info('Seeding the database...');
        exec("cd {$projectDir} && php artisan db:seed", $output, $return_var);
        if ($return_var !== 0) {
            $this->error('Database seeding failed.');
            return;
        }
        $this->info(implode("\n", $output));
    }
}
