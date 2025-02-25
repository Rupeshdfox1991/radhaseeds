<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;
// public $emailData;
    protected $emailData;

    /**
     * Create a new message instance.
     *
     * @param array $emailData
     * @return void
     */
    public function __construct($emailData)
    {
        $this->emailData = $emailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this            
            ->from('yogesh@dfoxmediadigital.com', 'Laravel')
            ->replyTo('yogesh@dfoxmediadigital.com', 'Laravel Support')
            ->subject($this->emailData['subject'])
            ->with([
                'name' => $this->emailData['name'],
                'tagline' => $this->emailData['tagline'],
            ])
            ->view('html_mail');
    }
}
