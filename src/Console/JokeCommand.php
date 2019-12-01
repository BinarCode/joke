<?php

namespace Binaryk\Joke\Console;

use Binaryk\Joke\Facades\Joke;
use Illuminate\Console\Command;

/**
 * @package Binaryk\Joke\Console;
 * @author Eduard Lupacescu <eduard.lupacescu@binarcode.com>
 */
class JokeCommand extends Command
{
    protected $signature = 'say-joke';

    public function handle()
    {
        $this->info(Joke::randomJoke());
    }
}
