<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Queue\InteractsWithQueue;

class QueryExecutedListener
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
     * @param QueryExecuted $event
     */
    public function handle(object $event): void
    {
        \Log::debug($event->sql,["parameters"=>$event->bindings, 'time'=>$event->time]);
    }
}
