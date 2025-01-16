<?php

namespace Apnem19\Alerts;

use Illuminate\Support\Facades\Facade;

class AlertFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'alert';
    }
}