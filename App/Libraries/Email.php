<?php

namespace App\Libraries;

Class Email
{
    protected $email;

    protected $subject;

    public function __construct($email, $subject)
    {
        $this->email = $email;

        $this->subject = $subject;
    }

    public function melvin()
    {
        return $this->email;
    }

    public function sendMail($message)
    {
        if ($_ENV['TEST_MAIL'] == 'on') {
            return false;
        }

        mail($this->email, $this->subject, $message);
    }

    public function addAttachment($document)
    {

    }

    public function wouter()
    {
        return $this->email;
    }

    public function folkert()
    {
        return $this->subject;
    }
}