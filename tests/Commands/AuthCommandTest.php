<?php

namespace Ridrog\Bulma\Test\Commands;

use Illuminate\Support\Facades\Artisan;
use Ridrog\Bulma\Test\TestCase as TestCase;

class AuthCommandTest extends TestCase
{
    /** test */
    public function it_can_run_the_bulma_auth_command()
    {
        Artisan::call('bulma:auth');

        $this->assertTrue(true);
    }

}