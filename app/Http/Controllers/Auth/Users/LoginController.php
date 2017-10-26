<?php

namespace App\Http\Controllers\Auth\Users;

use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Cache\RateLimiter;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Lang;
use Carbon\Carbon;
use Illuminate\Contracts\Cache\Repository as Cache;
use Illuminate\Support\Str;

class  LoginController extends BaseController
{
    use AuthenticatesUsers;

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/categories';
    protected $cache;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Cache $cache)
    {
        parent::__construct();
        $this->cache = $cache;
        $this->middleware('user_guest', ['except' => 'logout']);
        $this->middleware('check_attemp:User', ['only' => 'login']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @uses change login view to current project view
     */
    public function showLoginForm()
    {
        return view($this->getViewDir() . '.' . 'auth.users.login');
    }

    protected function validateLogin(Request $request)
    {
            $this->validate($request, [
                $this->username() => 'required|email|exists:users,' . $this->username() . '',
                'password' => 'required|min:8',
            ],
                [
                    $this->username() . '.exists' => 'Email is invalid or the account has been disabled.'
                ]);


    }
    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if (User::$check_attemp) { // check if email exists then increment lock for user with that email
            $this->incrementLoginAttempts($request);
        }
        $this->validateLogin($request);
        
        return $this->sendFailedLoginResponse($request);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @uses Logout and unset all users session
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
        return redirect(route("user.login.form"));
    }

    /**
     * Redirect the user after determining they are locked out.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * convert seconds to minutes
     */

    protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->availableIn(
            $this->throttleKey($request)
        );
        //convert seconds to minutes

        $minutes = floor($seconds % 3600 / 60);
        $message = Lang::get('auth.throttle_minutes', ['minutes' => $minutes]);
        $errors = [$this->username() => $message];
        if ($request->expectsJson()) {
            return response()->json($errors, 423);
        }
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }

    /**
     * @param Request $request
     * @return bool
     * Determine if the user has too many failed login attempts.
     * maxLoginAttempts limit 5
     * lockoutTime = 30 seconds
     */
    public function hasTooManyLoginAttempts(Request $request)
    {
        return $this->limiter()->tooManyAttempts(
            $this->throttleKey($request), 5, 30
        );
    }

    /**
     * Get the rate limiter instance.
     *
     * @return \Illuminate\Cache\RateLimiter
     */
    public function limiter()
    {
        return app(RateLimiter::class);
    }

    /**
     * Get the number of seconds until the "key" is accessible again.
     *
     * @param  string $key
     * @return int
     */
    public function availableIn($key)
    {
        return $this->cache->get($key . ':lockout') - Carbon::now()->getTimestamp();
    }

    public function incrementLoginAttempts(Request $request)
    {
        $this->limiter()->hit($this->throttleKey($request));
    }

    /**
     * Clear the login locks for the given user credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function clearLoginAttempts(Request $request)
    {
        $this->limiter()->clear($this->throttleKey($request));
    }

    /**
     * Fire an event when a lockout occurs.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function fireLockoutEvent(Request $request)
    {
        event(new Lockout($request));
    }

    /**
     * Get the throttle key for the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function throttleKey(Request $request)
    {
        return Str::lower($request->input($this->username())).'|'.$request->ip();
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->has('remember')
        );
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }
}
