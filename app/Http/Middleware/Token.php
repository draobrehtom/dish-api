<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
class Token
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if($request->has('access_token')) {
            $token = $request->get('access_token');
            $users = User::where('access_token', $token)->get();
            if(!is_null($users) && !$users->isEmpty()){
                $user = $users->first();
                if($user->role == $role) {
                    return $next($request);
                }else{
                    return response('no access token (admin)', 401);
                }
            }else{
                return response('no access token (wrong)', 401);
            }
        }else{
            return response('no access token', 401);
        }
    }
}
