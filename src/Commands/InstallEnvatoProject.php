<?php

namespace Laltu\LaravelEnvato\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use RuntimeException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Process\Process;
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

        // List of shell commands to run
        $commands = [
            "cd {$projectDir}",
            "composer install",
            "npm install",
            "npm run build",
            "php artisan migrate",
            "php artisan db:seed"
        ];

        // Execute all commands
        $this->runCommands($commands);
    }


    protected function runCommands(array $commands): void
    {
        $process = Process::fromShellCommandline(implode(' && ', $commands), null, null, null, null);

        // Enable TTY if applicable
        if ('\\' !== DIRECTORY_SEPARATOR && file_exists('/dev/tty') && is_readable('/dev/tty')) {
            try {
                $process->setTty(true);
            } catch (RuntimeException $e) {
                $this->output->writeln('  <bg=yellow;fg=black> WARN </> ' . $e->getMessage() . PHP_EOL);
            }
        }

        // Run the process and display the output
        $process->run(fn($type, $line) => $this->output->write('    ' . $line));

        // Handle process errors
        if (!$process->isSuccessful()) {
            $this->error('Failed to execute some commands.');
            $this->output->writeln($process->getErrorOutput());
        }
    }
}
