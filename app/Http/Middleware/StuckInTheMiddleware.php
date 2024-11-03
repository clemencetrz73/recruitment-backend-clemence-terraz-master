<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StuckInTheMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        /**
         * Your implementation here
         */

        return $next($request);
    }
}
