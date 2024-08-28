<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends Controller
{
  public function index(){
    echo "index";
  }
  public function edit(){

    $user = new User();

    return view("user/edit", ["user" => $user->getAll()]);

  }
}

