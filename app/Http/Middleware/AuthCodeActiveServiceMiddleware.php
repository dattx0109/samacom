<?php


namespace App\Http\Middleware;


class AuthCodeActiveServiceMiddleware
{
    public function handle($request, \Closure $next)
    {
//        dd(request()->user);
        if ($request->session()->has('user')){
            $request->request->add(['user' => session('user')]);

            return $next($request);
        }
        return redirect('/');
    }
}
