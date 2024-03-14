<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $subject;
    public $phone;
    public $message;

    public function __construct($name, $email, $subject, $phone, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->phone = $phone;
        $this->message = $message;
    }

    public function build()
    {
        return $this->markdown('mail.contact')
            ->with([
                'name' => $this->name,
                'email' => $this->email,
                'subject' => $this->subject,
                'phone' => $this->phone,
                'message' => $this->message,
            ]);
    }
}
