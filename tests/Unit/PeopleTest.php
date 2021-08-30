<?php

namespace Matteomeloni\Swapi\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Matteomeloni\Swapi\Models\People;
use Matteomeloni\Swapi\Models\Planet;
use Matteomeloni\Swapi\SwapiServiceProvider;
use Orchestra\Testbench\TestCase;


class PeopleTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [SwapiServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

    /** @test */
    public function it_belong_to_a_planet()
    {
        $planet = Planet::factory()->create();

        $people = People::factory()->create([
            'planet_id' => $planet->id
        ]);

        $this->assertInstanceOf(Planet::class, $people->planet);
    }
}
