<?php

namespace Botble\Career\Providers;

use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Career\Listeners\DeletedContentListener;
use Botble\Career\Listeners\SaveCareerListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        UpdatedContentEvent::class => [
            SaveCareerListener::class,
        ],
        CreatedContentEvent::class => [
            SaveCareerListener::class,
        ],
        DeletedContentEvent::class => [
            DeletedContentListener::class,
        ],
    ];
}
