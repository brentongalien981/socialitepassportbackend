<?php

namespace App\Http\Middleware;

use App\Models\MyAuthUser;
use Closure;
use Exception;
use Illuminate\Http\Request;

class MyAuth
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
        $possibleUsers = MyAuthUser::where('token', $request->input('token'))->get();

        if (isset($possibleUsers) && count($possibleUsers) === 1 && isset($possibleUsers[0])) {
            return $next($request);
        }

        return response("MyAuth: Unauthenticated", 401);

    }
}
