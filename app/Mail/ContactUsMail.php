<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $userMail;

    public function __construct($data, $userMail)
    {
        $this->data = $data;
        $this->userMail = $userMail;
    }

    public function build()
    {
        $address = 'mbendary577@gmail.com';
        $subject = 'Clear PMS Contact Mail';
        $name = 'Mohamed Bendary';

        return $this->view('emails.contactusMail')
                    ->from($address, $name)
                    ->subject($subject)
                    ->with([ 'content' => $this->data['content'], 'email' => $this->userMail ]);
    }
}
