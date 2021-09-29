<?php

namespace App\Providers;

use App\Events\AddNewPostEvent;
use App\Events\UserHasRegistedEvent;
use App\Listeners\AddNewPostListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\UserHasRegistedListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UserHasRegistedEvent::class => [
            UserHasRegistedListener::class,
        ],
        AddNewPostEvent::class => [
            AddNewPostListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
