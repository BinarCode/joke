<?php

namespace Binaryk\Joke\Controllers;

use Binaryk\Joke\Facades\Joke;

/**
 * @package Binaryk\Joke\Controllers;
 * @author Eduard Lupacescu <eduard.lupacescu@binarcode.com>
 */
class JokeController
{
    public function __invoke()
    {
        return view('jokes::joke')->with([
            'joke' => Joke::randomJoke(),
        ]);
    }
}
