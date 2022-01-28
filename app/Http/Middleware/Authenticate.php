<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
         if (! $request->expectsJson()) {
            return route('main');
        }

        // if ($request->is('business_owner') || $request->is('business_owner/*')) {
        //     return redirect()->guest('/login/business_owner')-with('utype', 'business_owner');
        // }
        // if ($request->is('customer') || $request->is('customer/*')) {
        //     return redirect()->guest('/login/customer')-with('utype', 'customer');
        // }
        // return redirect()->guest(route('main'));
    }
}
