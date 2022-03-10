<?php

namespace App\Controllers;

use App\Models\UsersModel;

class User extends BaseController
{
    private $usersModel;

    public function __construct()
    {
        $this->usersModel = model('App\Models\UsersModel');
    }
    public function index()
    {
        $users = $this->annoncesModel->getAllUsers();

        echo view('users/index', [
            "users" => $users,
        ]);
    }
}
