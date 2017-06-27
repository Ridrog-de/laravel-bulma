<?php

namespace Ridrog\Bulma\Test\Commands;

use Illuminate\Support\Facades\Artisan;
use Ridrog\Bulma\Test\TestCase as TestCase;

class PresetCommandTest extends TestCase
{
    /** @test */
    public function it_can_run_the_bulma_preset_command()
    {
        Artisan::call('bulma:preset');

        $this->assertTrue(true);
    }

}