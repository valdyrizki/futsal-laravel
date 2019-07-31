<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Redirect;

class Member
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

            $level = Session::get('level');

            if ($level == 1) {
                return $next($request);
            }else{
                return Redirect::to('login')->withErrors(['keterangan' => 'Anda tidak berhak mengakses halaman ini']);
            }
    }
}
