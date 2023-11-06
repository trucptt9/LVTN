<?php

namespace App\Http\Middleware;

use App\Models\Staff;
use App\Models\Store;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkStaff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $staff = Staff::whereHas('store', function ($q) {
                $q->ofStatus(Store::STATUS_ACTIVE)->whereHas('license', function ($q1) {
                    $q1->where('date_start', '<=', now())->where('date_end', '>=', now());
                });
            })->ofStatus(Staff::STATUS_ACTIVE)->find(auth()->user()->id);
            if ($staff) {
                return  $next($request);
            }
            Auth::logout();
        }
        return redirect()->route('login');
    }
}
