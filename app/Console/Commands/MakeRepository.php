<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class';

    /**
     * Execute the console command.
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $name = $this->argument('name');
        $this->createRepository($name);
    }

    private function createRepository($name)
    {
        $filesystem = new Filesystem();

        $repoPath = app_path('Repositories/Eloquents/' . $name . 'Repository.php');
        $interfacePath = app_path('Repositories/Interfaces/' . $name . 'Interface.php');

        if ($filesystem->exists($repoPath) || $filesystem->exists($interfacePath)) {
            $this->error('Repository or Interface already exists!');
            return;
        }

        $filesystem->ensureDirectoryExists(app_path('Repositories/Eloquents'));

        $reposContent = "<?php\n\nnamespace App\Repositories\Eloquents;\n\nuse App\Repositories\Interfaces\\" . $name . "Interface;\n\nclass " . $name . "Repository implements " . $name . "Interface\n{\n\n}";

        $interfaceContent = "<?php\n\nnamespace App\Repositories\Interfaces;\n\ninterface " . $name . "Interface\n{\n\n}";

        $filesystem->put($repoPath, $reposContent);

        $filesystem->put($interfacePath, $interfaceContent);

        $this->info('Repository and Interface created successfully!');
    }

}
