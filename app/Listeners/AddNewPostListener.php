<?php

namespace App\Listeners;

use App\Mail\AddNewPost;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use SebastianBergmann\Environment\Console;

class AddNewPostListener
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
        // Mail::to('marctsob2321@gmail.com')->send(new AddNewPost($event->post));
      
    }
}
