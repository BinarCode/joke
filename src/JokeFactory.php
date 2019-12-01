<?php

namespace Binaryk\Joke;

class JokeFactory {
    /**
     * @var array
     */
    protected $jokes = [
        'Chuck Norris threw a grenade and killed 50 people, then it exploded.',
        'Chuck Norris has cows grilling his steaks for him.',
        'Chuck Norris can kill two stones with one bird.',
        'Chuck Norris can hear sign language.',
    ];

    public function __construct(array $jokes = null)
    {
        if ($jokes) {
            $this->jokes = $jokes;
        }
    }

    /**
     * @return mixed
     */
    public function randomJoke()
    {
        return $this->jokes[array_rand($this->jokes)];
    }
}
