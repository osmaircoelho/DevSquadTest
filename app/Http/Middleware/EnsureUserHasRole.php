<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->name == 'Jane Doe') {
            abort(response()->json(
                [
                    'api_status' => '401',
                    'message' => 'UnAuthenticated',
                ], 401));
        }

        return $next($request);
    }
}
