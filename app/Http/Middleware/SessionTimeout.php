<?php

namespace MyEscrow\Http\Middleware;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;

use Closure;

class SessionTimeout {
    protected $session;
    protected $timeout=300000000000;
    public function __construct(Store $session){
        $this->session=$session;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$this->session->has('lastActivityTime'))
            $this->session->put('lastActivityTime',time());
        elseif(time() - $this->session->get('lastActivityTime') > $this->timeout){
            $this->session->forget('lastActivityTime');
            Auth::logout();
            return redirect('/login')->withErrors(['You had not activity in 15 minutes']);
        }
        $this->session->put('lastActivityTime',time());
        return $next($request);
    }
 
  
}



