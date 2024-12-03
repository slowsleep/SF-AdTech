<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Auth;

class CheckUserActiveStatus
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
    public function handle(Authenticated $event): void
    {
        if (!$event->user->active) {
            Auth::logout(); // Разлогиниваем пользователя
            abort(403, 'Your account is inactive. Please contact the administrator.');
        }
    }
}
