<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeUserMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data_mail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data_mail)
    {
        $this->data_mail = $data_mail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->subject($this->data_mail['subject'])->view('mail.mail', ['data_mail' => $this->data_mail]);
    }
}
