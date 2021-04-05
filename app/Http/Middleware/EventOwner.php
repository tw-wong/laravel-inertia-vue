<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;

class EventOwner
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
        $eventId = $request->route('event_id');
        $userId  = $request->user()->id;
        
        if(!$this->isOwner($eventId, $userId)){
            return redirect('dashboard');
        }
        
        return $next($request);
    }
    
    protected function isOwner($eventId, $userId){
        $return = true;
                    
        if(is_null($eventId)){
            return $return;
        }
        
        $count = Event::where([
            'id' => $eventId, 
            'user_id' => $userId
        ])->count();
        
        $return = $count ? $return : false;
        return $return;
        
    }
}
