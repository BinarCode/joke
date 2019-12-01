<?php

namespace Binaryk\Joke;

use GuzzleHttp\Client;

class JokeFactory
{
    const API = 'http://api.icndb.com/jokes/random';

    /**
     * @var Client
     */
    protected $client;

    public function __construct(Client $client = null)
    {
        $this->client = $client ?: new Client();
    }

    /**
     * @return mixed
     */
    public function randomJoke()
    {
        $response = $this->client->get(self::API);

        $joke = json_decode($response->getBody()->getContents());

        return $joke->value->joke;
    }
}
