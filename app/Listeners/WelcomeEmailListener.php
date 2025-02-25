<?php

namespace App\Listeners;

use App\Events\WelcomeEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WelcomeEmailListener implements ShouldQueue
{
    public $queue = 'Listener';
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
     * @param  \App\Events\WelcomeEvent  $event
     * @return void
     */
    public function handle(WelcomeEvent $event)
    {
        $user = $event->user;
        $emailData = [
            'subject' => 'Welcome to Blog',
            'body' => 'Welcome to Blog. This is the sending email',
            'tagline' => 'This is blog'
        ];
        Mail::to((string) $user->email)
        // ->locale('en')
        ->send(new WelcomeEmail($emailData));
    }
}
