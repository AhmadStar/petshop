<?php
namespace App\Http\Middleware;
use Closure;
class Admin
{
    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->user()->role=='admin'){
            return $next($request);
        }
        else{
            request()->session()->flash('error','Bu sayfaya erişim izniniz yok');
            return redirect()->route($request->user()->role);
        }
    }
}
