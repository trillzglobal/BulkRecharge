<?php

namespace App\Http\Middleware;

use App\Models\IpTable;
use Closure;
use Illuminate\Http\Request;

class LoginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userID = $request->user()->id;
        $userIpAddress = $request->ip();

        $ipData = IpTable::where(['user_id' => $userID, 'ipaddress'=> $userIpAddress])->first();

        if (empty($ipData)){
            return failed('Request from Unauthorized server/ IP '.$userIpAddress, []);
        }
        return $next($request);
    }
}
