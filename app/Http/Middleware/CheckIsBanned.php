<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIsBanned
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
        $user = Auth::user();
        if ($user->isBanned()) {
            session()->flush();
            return redirect('login')->withInput()->withErrors([
                'email' => 'Аккаунт заблокирован администратором.',
            ]);
        }
        return $next($request);
    }
}
