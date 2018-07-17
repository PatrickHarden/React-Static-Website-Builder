<?php

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class Netlify extends Facade {



    protected static function getFacadeAccessor()
    {
        return 'Netlify/Client';
    }

}
