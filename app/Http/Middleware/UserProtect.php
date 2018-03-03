<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Lists;

class UserProtect
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
        $list = Lists::find($request->route('list'));
        if ($list->private && ($list->user_id != Auth::id())) {
          return redirect('/lists');
        }
         return $next($request);
    }
}
