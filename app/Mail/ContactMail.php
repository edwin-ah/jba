<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $phone;
    public $description;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $phone, $subject, $description)
    {
        $this->email = $email;
        $this->phone = $phone;
        $this->subject = $subject;
        $this->description = $description;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.Contact')->subject($this->subject);
    }
}
