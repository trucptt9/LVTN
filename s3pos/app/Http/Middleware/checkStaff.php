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
            $staff = Staff::with('store')->find(auth()->user()->id);
            if ($staff && $staff->status == Staff::STATUS_ACTIVE && $staff->store && $staff->store->status == Store::STATUS_ACTIVE) {
                return $next($request);
            }
            Auth::logout();
        }
        return redirect()->route('login');
    }
}
