<?php

namespace Rabbihasan\LaravelService\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;

class MakeServiceCommand extends Command
{
    protected $signature = 'service:make {name}';
    protected $description = 'Generate full CRUD structure for a service module';

    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle()
    {
        $name = Str::studly($this->argument('name'));     // e.g. Service
        $plural = Str::plural(Str::snake($name));         // e.g. services
        $kebab = Str::kebab($name);                       // e.g. service
    
        // List of all models to create
        $modelNames = [
            $name,
            $name . 'List',
            $name . 'Form'
        ];

        $x = 0;
    
        foreach ($modelNames as $modelName) {
           
            $this->makeModel($modelName, $x, $name);

            $this->makeMigration($modelName, $x);

            // Generate Controller
            $this->makeController($name, $plural, $name, $x);

            $x++;
        }

        $this->makeViews($plural);
        $this->appendRoutes($name, $plural);

    
        $this->info("Service module [{$name}] generated successfully.");
    }
    
    protected function parseFields($input)
    {
        if (empty($input)) return [];
        
        $fields = [];
        foreach (explode(',', $input) as $field) {
            [$name, $type] = array_pad(explode(':', trim($field)), 2, 'string');
            $fields[$name] = $type;
        }
        return $fields;
    }

    protected function makeModel($modelName, $x, $name)
    {
        $path = app_path("Models/{$modelName}.php");

        $stubName = 'service_model';
        $rel_model = '';
        $list_model = '';
        $form_model = '';

        switch ($x) {
            case 0:
                $stubName = 'service_model';
                $rel_model = '';
                $list_model = $modelName . 'List';
                $form_model = $modelName . 'Form';
                break;
            case 1:
                $stubName = 'list_model';
                $rel_model = $name;
                break;
            case 2:
                $stubName = 'form_model';
                $rel_model = $name;
                break;
        }

        if (!$this->files->exists($path)) {
            $stub = $this->getStub($stubName);
            
            $stub = str_replace(
                ['{{class}}', '{{rel_model}}', '{{list_model}}', '{{form_model}}'],
                [$modelName, $rel_model, $list_model, $form_model],
                $stub
            );
            
            $this->files->put($path, $stub);
        }
    }

    protected function makeMigration($modelName, $x)
    {
        $table = Str::snake(Str::pluralStudly($modelName));
        $timestamp = date('Y_m_d_His');
        $path = database_path("migrations/{$timestamp}_create_{$table}_table.php");


        switch ($x) {
            case 0:
                $stubName = 'service_migration';
                $table = Str::snake(Str::pluralStudly($modelName));
                break;
            case 1:
                $stubName = 'list_migration';
                $table = Str::snake(Str::pluralStudly($modelName));
                break;
            case 2:
                $stubName = 'form_migration';
                $table = Str::snake(Str::pluralStudly($modelName));
                break;
        }
    
        if (!$this->files->exists($path)) {
            $stub = $this->getStub($stubName);
            
            $stub = str_replace(
                ['{{table}}'],
                [$table],
                $stub
            );
            
            $this->files->put($path, $stub);
        }
    }
    
    protected function makeController($modelName, $plural, $name, $x)
    {
        $directory = app_path("Http/Controllers/Admin/{$name}");
    
        if (!$this->files->exists($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }
    
        $stubName = '';
        $class = '';
        $model = '';
    
        switch ($x) {
            case 0:
                $stubName = 'service_controller';
                $class = $modelName . 'Controller';
                $model = $name;
                break;
            case 1:
                $stubName = 'list_controller';
                $class = $modelName . 'ListController';
                $model = $name . 'List';
                break;
            case 2:
                $stubName = 'form_controller';
                $class = $modelName . 'FormController';
                $model = $name . 'Form';
                break;
            default:
                throw new \InvalidArgumentException("Invalid controller type: {$x}");
        }
    
        $path = $directory . "/{$class}.php";
        
        $stub = $this->getStub($stubName);
        
        $stub = str_replace(
            [
                '{{namespace}}', 
                '{{model}}', 
                '{{views}}', 
                '{{route}}', 
                '{{notify}}', 
                '{{file_path}}',
                '{{class}}'
            ],
            [
                $name,           // namespace
                $model,      // model
                $plural,         // views
                $plural,         // route
                $model,      // notify
                $plural,         // file_path
                $class           // class
            ],
            $stub
        );
        
        $this->files->put($path, $stub);
        $this->info("Controller created: {$path}");
    }
    protected function makeViews($slug)
    {
        if (!$slug) {
            $this->error("Slug is required");
            return false;
        }
    
        $viewPath = resource_path("views/admin/{$slug}");
        $zipPath = __DIR__ . "/../stubs/views.zip";
    
        if ($this->files->exists($viewPath)) {
            return false;
        }
    
        $this->files->makeDirectory($viewPath, 0755, true);
    
        // Use system unzip command
        $command = "unzip -q " . escapeshellarg($zipPath) . " -d " . escapeshellarg($viewPath);
        $output = null;
        $result = null;
        
        exec($command, $output, $result);
        
        if ($result === 0) {
            $this->info("Views successfully extracted");
            return true;
        } else {
            $this->error("Failed to extract zip file");
            return false;
        }
    }

    protected function appendRoutes($name, $plural)
    {
        $routeFile = base_path('routes/admin.php');
    
        // Check if route file exists
        if (!$this->files->exists($routeFile)) {
            $this->error("Route file not found: {$routeFile}");
            return false;
        }
    
        // Check if route file is writable
        if (!$this->files->isWritable($routeFile)) {
            $this->error("Route file is not writable: {$routeFile}");
            return false;
        }
    
        $stub = $this->getStub('routes');
        
        // Validate stub content
        if (empty($stub)) {
            $this->error("Route stub is empty or not found");
            return false;
        }
    
        $namespace = "App\Http\Controllers\Admin\\" . $name . "\\" . $name;
        $route = $plural;
        
        $stub = str_replace(
            ['{{namespace}}', '{{route}}'],
            [$namespace, $route],
            $stub
        );
    
        // Check if route already exists to avoid duplicates
        $currentContent = $this->files->get($routeFile);
        if (strpos($currentContent, $stub) !== false) {
            $this->info("Route already exists in: {$routeFile}");
            return true;
        }
    
        try {
            $this->files->append($routeFile, "\n" . $stub);
            $this->info("Route successfully appended to: {$routeFile}");
            return true;
        } catch (\Exception $e) {
            $this->error("Failed to append route: " . $e->getMessage());
            return false;
        }
    }


    protected function getStub($type)
    {
        return file_get_contents(__DIR__."/../stubs/{$type}.stub");
    }
}