<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Version extends Facade
{
    protected static function getFacadeAccessor() { return \App\Helpers\Version::class; }
}