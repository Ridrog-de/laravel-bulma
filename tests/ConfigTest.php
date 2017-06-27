<?php

namespace Ridrog\Bulma\Test;

use Illuminate\Support\Facades\Artisan;
use Ridrog\Bulma\Test\TestCase as TestCase;

class ConfigTest extends TestCase
{

    /** @test */
    public function the_config_exists()
    {
        $path = __DIR__.'/../config/bulma.php';

        $this->assertFileExists($path);
    }

    /** @test */
    public function publishing_config_works()
    {
        Artisan::call( 'vendor:publish', ['--tag' => 'bulma-config']);

        $this->assertFileExists(config_path('bulma.php'));
    }

}