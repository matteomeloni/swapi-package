<?php

namespace Matteomeloni\Swapi\Facades;

use Illuminate\Support\Facades\Facade;

class Swapi extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'swapi';
    }
}
