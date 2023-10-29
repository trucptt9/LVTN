<?php

namespace App\Providers;

use App\Events\GenerateDataBrand;
use App\Events\GenerateDataStore;
use App\Events\StaffLogin;
use App\Listeners\GenerateDataBrandListen;
use App\Listeners\GenerateDataStoreListen;
use App\Listeners\StaffLoginListen;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        GenerateDataStore::class => [
            GenerateDataStoreListen::class,
        ],
        GenerateDataBrand::class => [
            GenerateDataBrandListen::class,
        ],
        StaffLogin::class => [
            StaffLoginListen::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
