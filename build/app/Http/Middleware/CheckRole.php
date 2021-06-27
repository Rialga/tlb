<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Flash;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $jabatan = Auth::user()->jabatan->kode_jabatan;
        if (is_array($roles)) {
            foreach ($roles as $key => $role) {
                if ($jabatan === $role) {
                    return $next($request);
                }
            }
        }
        if ($roles === $jabatan) {
            return $next($request);
        }
        Flash::error('Anda tidak memiliki akses ke halaman tersebut!');
        return redirect()->back();
    }
}
