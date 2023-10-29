<?php

namespace App\Listeners;

use App\Events\StaffLogin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class StaffLoginListen
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(StaffLogin $event): void
    {
        try {
            $staff = $event->staff;
            $staff->last_login = now();
            $staff->save();
            Auth::login($staff);
        } catch (\Throwable $th) {
            showLog($th);
        }
    }
}
