<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CareersFormMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from($this->data['email'], explode(' ', $this->data['name'])[0])
            ->subject('Radha Seeds - Career Inquiry')
            ->view('emails.careers-form', ['data' => $this->data])
            ->attach($this->data['file']->getRealPath(), [
                'as' => $this->data['file']->getClientOriginalName(),
                'mime' => $this->data['file']->getClientMimeType(),
            ]);
    }
}