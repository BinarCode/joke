<?php

namespace Binaryk\Joke\Tests;

use Binaryk\Joke\JokeFactory;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase {

    /**
     * @test
     */
    public function it_say_random_joke()
    {
        $jokes = [
            'Chuck Norris threw a grenade and killed 50 people, then it exploded.',
            'Chuck Norris has cows grilling his steaks for him.',
            'Chuck Norris can kill two stones with one bird.',
            'Chuck Norris can hear sign language.',
        ];
        $factory = new JokeFactory($jokes);
        $joke = $factory->randomJoke();
        $this->assertContains($joke, $jokes);
    }

}
