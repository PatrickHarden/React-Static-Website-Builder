<?php

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class Bitbucket extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'Bitbucket/Api';
    }
}
