<?php

namespace Ridrog\Bulma\Console\Commands;

use Ridrog\Bulma\BulmaAuth;
use Illuminate\Console\Command;


class AuthCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bulma:auth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaffold Bulma.io Masterview, Login and Registration views and routes';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        BulmaAuth::install();

        $this->info("---------------------------------------");
        $this->info("| Done");
        $this->info("| Next steps: ");
        $this->info("| npm install --save-dev bulma font-awesome");
        $this->info("| npm run dev");
        $this->info("---------------------------------------");
    }


}
