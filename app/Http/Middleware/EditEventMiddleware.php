<?php

namespace App\Http\Middleware;

use Closure;
use App\Event;
use Illuminate\Support\Facades\Auth;

class EditEventMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $event = $request->get('id');
        //Check to see if event exists
        if($event = Event::find($event)) {
            //Ensure the user is logged in
            if(!(Auth::guest())) {
            //Check if user is the original poster or user is admin
                if($event->uploaderID == Auth::user()->id || Auth::user()->admin == 1) {
                    return $next($request);

                } else {
                     return redirect('events')->with('message', "You are not authorized to edit that event!");
                }
            } else {
                return redirect('events')->with('message', "You Must Be Logged in to Edit Events");
            }
        } else {
            return redirect('events')->with('message', "Event " . $event . " does not exist");
        }
    }
}
