<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,

        // Middleware Users And Teacher
        'user_auth' => \App\Http\Middleware\CheckUserMiddleware::class,
        'user_guest' => \App\Http\Middleware\RedirectIfUserAuthenticated::class,
        'teacher_auth' => \App\Http\Middleware\CheckTeacherMiddleware::class,
        'teacher_guest' => \App\Http\Middleware\RedirectIfTeacherAuthenticated::class,

        // Authorization
        'ceberus' => \App\Http\Middleware\CerberusMiddleware::class,
        //check Attemp Email User And Teacher
        'check_attemp' => \App\Http\Middleware\CheckAttempMiddlware::class,
        // check dates from request to Reserver
//        'reserve_date' => \App\Http\Middleware\ReserveDateMiddleware::class
    ];
}
