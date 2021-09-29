<?php

namespace App\Listeners;

use App\Mail\WelcomeUserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class UserHasRegistedListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //envoie du mail
        // Mail::to($event->user->email)->send(new WelcomeUserMail($event->user));
        // dd("debut envoie mail à");
        try {

        // Mail::to($event->user->email)->send(new WelcomeUserMail($event->user));
        Mail::to("marctsob2321@gmail.com")->send(new WelcomeUserMail($event->user));
        } catch (\Swift_TransportException $e) {
            dd("send mail failed");
            $e->getMessage();
        }
    }
}
