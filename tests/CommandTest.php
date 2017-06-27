<?php

namespace Ridrog\Bulma\Test;

use Illuminate\Support\Facades\Artisan;
use Ridrog\Bulma\BulmaServiceProvider;
use Ridrog\Bulma\Test\TestCase as TestCase;

class CommandTest extends TestCase
{
    /**
     * Setup
     */
    public function setUp()
    {
        parent::setUp();
    }

    /** @test */
    public function it_can_run_the_bulma_preset_command()
    {
        Artisan::call('bulma:preset');

        $this->assertTrue(true);
    }

    /** @test */
    public function it_can_run_the_bulma_auth_command()
    {
        Artisan::call('bulma:auth');

        $this->assertTrue(true);
    }

}