<?php

namespace Modules\ModuleExample\app\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use function abort;
use function config;

class ItemActiveMiddlewarre
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $prefix = explode('/', $request->route()->getPrefix())[1];
        if(!config('items.'.$prefix, false)) {
            abort(404);
        }

        return $next($request);
    }
}
