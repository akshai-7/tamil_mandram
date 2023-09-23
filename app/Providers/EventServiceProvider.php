<?php

namespace App\Providers;

use App\Events\EventNotification;
use Illuminate\Auth\Events\Registered;
use App\Events\SendPayslip;
use App\Listeners\SendEventNotification;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use App\Listeners\SendIndividualPayslip;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SendPayslip::class => [
            SendIndividualPayslip::class,
        ],
        EventNotification::class => [
            SendEventNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //dd();
    }
}
