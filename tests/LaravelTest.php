<?php

namespace Binaryk\Joke\Tests;

use Binaryk\Joke\Facades\Joke;
use Binaryk\Joke\JokeFactory;
use Binaryk\Joke\JokeServiceProvider;
use Illuminate\Support\Facades\Artisan;
use Orchestra\Testbench\TestCase;

/**
 * @package Binaryk\Joke\Tests;
 * @author Eduard Lupacescu <eduard.lupacescu@binarcode.com>
 */
class LaravelTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            JokeServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'JokeAlias' => Joke::class,
        ];
    }

    /** * @test */
    public function it_say_a_random_joke()
    {
        $this->withoutMockingConsoleOutput();

        Joke::shouldReceive('randomJoke')
            ->once()
            ->andReturn('some joke');

        $this->artisan('say-joke');
        $output = Artisan::output();

        $this->assertSame('some joke'.PHP_EOL, $output);
        $this->assertEquals('some joke'.PHP_EOL, $output);
    }

    /**
     * @test
     */
    public function it_should_load_route()
    {
        Joke::shouldReceive('randomJoke')
            ->once()
            ->andReturn('some joke');


        $this->get('jokes')
            ->assertViewIs('jokes::joke')
            ->assertViewHas('joke', 'some joke')
            ->assertStatus(200);
    }
}
