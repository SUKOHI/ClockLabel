<?php namespace Sukohi\ClockLabel\Facades;

use Illuminate\Support\Facades\Facade;

class ClockLabel extends Facade {

    /**
    * Get the registered name of the component.
    *
    * @return string
    */
    protected static function getFacadeAccessor() { return 'clock-label'; }

}