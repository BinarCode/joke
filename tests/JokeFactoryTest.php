<?php

namespace Binaryk\Joke\Tests;

use Binaryk\Joke\JokeFactory;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_say_random_joke()
    {
        $mock = new MockHandler([
            new Response(200, [], '{ "type": "success", "value": { "id": 561, "joke": "Joke here", "categories": [] } }'),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $factory = new JokeFactory($client);

        $joke = $factory->randomJoke();

        $this->assertSame($joke, 'Joke here');
    }
}
