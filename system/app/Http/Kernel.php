<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        \App\Http\Middleware\RedirectIfNotAutenticate::class,
    ];

    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\RedirectIfNotAutenticate::class,
    ];
}