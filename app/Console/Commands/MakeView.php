<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeView extends Command
{
    protected $signature = 'make:view {name}';
    protected $description = 'Create a new Blade view file';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $name = $this->argument('name');
        $path = resource_path('views/' . $name . '.blade.php');

        // Create the directory if it does not exist
        $directory = dirname($path);
        if (!File::isDirectory($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // Check if the file already exists
        if (File::exists($path)) {
            $this->error('View already exists!');
            return 1;
        }

        // Create the file with some default content
        File::put($path, '<!-- ' . $name . ' view -->');
        $this->info('View created successfully!');
        return 0;
    }
}
