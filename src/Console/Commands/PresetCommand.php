<?php

namespace Ridrog\Bulma\Console\Commands;

use Illuminate\Console\Command;
use Ridrog\Bulma\BulmaPreset;


class PresetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bulma:preset';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Preset for Bulma';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        BulmaPreset::install();

        $this->info("Done! Run 'yarn' or 'npm install");

    }

}
