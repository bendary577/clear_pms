<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $userMail)
    {
        $this->data = $data;
        $this->userMail = $userMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'mbendary577@gmail.com';
        $subject = 'Reset Password Email';
        $name = 'Mohamed Bendary';

        return $this->view('emails.activateAdminMail')
                    ->from($address, $name)
                    ->subject($subject)
                    ->with([ 'content' => $this->data['content'], 'email' => $this->userMail ]);
    }
}
