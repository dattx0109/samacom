<?php


namespace App\Http\Middleware;


class AuthServiceMiddleware
{
    public function handle($request, \Closure $next)
    {
//        dd($next($request));
        if ($request->session()->has('user')){
            $request->request->add(['user' => session('user')]);

            if(request()->user->is_active ==0){
                return redirect('/confirm/sms');
            }
            return $next($request);
        }
        return redirect('/');
    }
}
