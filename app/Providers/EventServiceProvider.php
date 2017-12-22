<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    // php artisan event:generate will generate code for events listed here
    protected $listen = [
        'App\Events\ThreadCreated' => [
            'App\Listeners\NotifySubscribers',
            'App\Listeners\CheckForSpam'
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

        //
    }
}
