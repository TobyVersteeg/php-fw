<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Libraries\View;
use App\Libraries\MySql;
class UserController extends Controller
{

    public function index()
    {
        if (isset($_SESSION) && isset($_SESSION['user'])) {
            echo "Yes!!!";
        } else {
            die('Not loged in');
        }
    }

    public function add()
    {

    }

    /**
     * Store a user record into the database
     */
    public function store()
    {
        
    }

    /**
     * Updates a user record into the database
     */
    public function update()
    {
        
    }

    /**
     * Archive a user record into the database
     */
    public function destroy(int $id)
    {

    }

}

