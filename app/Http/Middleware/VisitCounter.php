<?php

namespace App\Http\Middleware;

use Closure;
use Auth, Route, Cache, App\Classified;

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

        $parameters = Route::current()->parameters();

        if (!isset($parameters['id'])) {
            return $result;
        }

        $id = $parameters['id'];
        $this->incrementClassifiedVisitCount($id, $request);

        return $result;
    }

    private function incrementClassifiedVisitCount($id, $request)
    {
        if (!$this->validateIncrement($id, $request)) {
            return;
        }

        $classified = Classified::find($id);

        if ($this->isOwnClassified($classified)) {
            return;
        }

        $classified->timestamps = false;
        $classified->increment('visits');
        Cache::put($this->cacheKey($id, $request), 1, 1440); // for a full day
    }

    private function cacheKey($id, $request)
    {
        return 'visited_' . $id . '_' . (Auth::check() ? Auth::id() : $request->getClientIp());
    }

    private function validateIncrement($id, $request)
    {
        return !Cache::has($this->cacheKey($id, $request));
    }

    private function isOwnClassified($classified)
    {
        return !Auth::check() || Auth::id() != $classified->user_id;
    }
}
