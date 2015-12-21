<?php

namespace App\Http\Middleware;

use Closure;
use Cache, App\Classified;

class VisitCounter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $result = $next($request);

        $id = $request->get('id');
        $cacheKey = 'visited_' . $id . '_' . $request->getClientIp();

        if (!Cache::has($cacheKey)) {
            $classified = Classified::find($id);

            if ($classified) {
                $classified->timestamps = false; // don't change updated at field
                $classified->increment('visits');
                Cache::put($cacheKey, 1, 1440); // for a full day
            }
        }

        return $result;
    }
}
