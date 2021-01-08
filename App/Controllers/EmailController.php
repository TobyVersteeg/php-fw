<?php

namespace App\Controllers;

use App\Libraries\View;
use App\Libraries\Email;

class EmailController {

    public function index()
    {
        return View::render('email.view.');
    }

    public function store()
    {

        // checks

        $email = new Email($_POST['email'], $_POST['subject']);
        $email->sendMail($_POST['message']);

        

    }

}