<?php

namespace App\Controllers;

use App\Libraries\View;

class ContactController
{
    public function index()
    {
        return View::render('contact.view');
    }

    public function store()
    {
        
    }
}