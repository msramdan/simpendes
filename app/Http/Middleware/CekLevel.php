<?php

namespace App\Http\Middleware;

use Closure;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $privilege)
    {
      
        if($privilege == 'admin' && auth()->user()->level == 'admin'){
            return $next($request);
        }else if($privilege == 'guru' && auth()->user()->level == 'guru'){       
            return $next($request);
        }else if($privilege == 'admin&guru'){
            if(auth()->user()->level == 'admin'){
                  return $next($request);
             }else if(auth()->user()->level == 'guru'){
                  return $next($request);
             }
        }
          
        return back();
    }
}
