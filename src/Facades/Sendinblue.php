<?php

namespace Combindma\Sendinblue\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Combindma\Sendinblue\Sendinblue
 */
class Sendinblue extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-sendinblue';
    }
}
