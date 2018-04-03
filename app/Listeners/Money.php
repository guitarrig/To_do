<?php

namespace App\Listeners;

use App\Events\Curs;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Money
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Curs  $event
     * @return void
     */
    public function handle(Curs $event)
    {
        $a = 'sssss';
        return $a;
    }
}
