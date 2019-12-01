<?php

namespace Binaryk\Joke\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static randomJoke
 * @author Eduard Lupacescu <eduard.lupacescu@binarcode.com>
 */
class Joke extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'joke';
    }
}
