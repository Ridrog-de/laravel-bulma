<?php

namespace Ridrog\Bulma\Test;

use Illuminate\Support\ServiceProvider;
use Ridrog\Bulma\BulmaServiceProvider;
use Ridrog\Bulma\Test\TestCase as TestCase;

class ServiceProviderTest extends TestCase
{

    /**
     *
     * @var BulmaServiceProvider
     */
    private $provider;

    /**
     * Setup
     */
    public function setUp()
    {
        parent::setUp();

        $this->provider = $this->app->getProvider(BulmaServiceProvider::class);

    }

    /**
     * Tear Down
     */
    public function tearDown()
    {
        unset($this->provider);

        parent::tearDown();
    }

    /** @test */
    public function it_can_be_instantiated()
    {
        $expectations = [
             \Illuminate\Support\ServiceProvider::class,
             BulmaServiceProvider::class
        ];

        foreach ($expectations as $expected) {
            $this->assertInstanceOf($expected, $this->provider);
        }
    }

}