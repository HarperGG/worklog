<?php

namespace App\Http\Middleware\Admin;

use Closure;
use App;
use Illuminate\Support\Arr;

class ResourceIdCheck
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
        $route = $request->route();
        $methodArray = ["show","destroy","update","indexByCategory","updateBanState","updateTopState","resetPassword"];
        //检查资源路由器上的id,
        //如:Route::resource("shop", 'ShopController'); ,请求shop/111时,如果111是非数字字符,则会走此校验
        $actionMethod = $route->getActionMethod();
        if (in_array($actionMethod,$methodArray)) {
            $firstRouterParam = Arr::first(($route->parameters()));
            if ($firstRouterParam) {
                if (!preg_match('/^\d{1,}$/', $firstRouterParam)) {
                    return response()->fail(100,'参数错误',null);
                }
            }
        }
        return $next($request);
    }
}
