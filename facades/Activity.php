<?php namespace Vhiearch\UserActivity\Facades;

use October\Rain\Support\Facade;

class Activity extends Facade
{
    /**
     * Get the registered name of the component.
     * @return string
     */
    protected static function getFacadeAccessor() { return 'useractivity.activity'; }
}
