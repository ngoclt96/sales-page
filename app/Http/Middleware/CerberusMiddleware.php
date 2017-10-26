<?php

namespace App\Http\Middleware;

use App\AppConst\Constants;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

/**
 * Class CerberusMiddleware
 * @package App\Http\Middleware
 * @use Authority logged in user
 */

class CerberusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $account = $request->user();
//        dd($account);
        $accountType = $account->account_type;
//        dd($account->account_type);
        $groupType = Constants::USER_TYPE;

//        $childrenDepartment = $account->getChildrentDepartments();
        $currentRoute = $request->route()->action['as'];
        list($controller, $action) = explode('.', $currentRoute);
        $roles = Config::get('acl');
        if (!isset($groupType[$accountType]))
        {
            return response()->view(Constants::VIEW_DIR . '.errors.403', [], '403');
        }
        if (!array_key_exists($controller, $roles))
        {
            return response()->view(Constants::VIEW_DIR . '.errors.403', [], '403');
        }

        $actions = $roles[$controller]['function'];

        if (!array_key_exists($action, $actions))
        {
            return response()->view(Constants::VIEW_DIR . '.errors.403', [], '403');
        }

        $privileges = $roles[$controller]['function'][$action]['privilege'];
        if (!in_array($groupType[$accountType], $privileges))
        {
            return response()->view(Constants::VIEW_DIR . '.errors.403', [], '403');
        }

        return $next($request);

    }
}
