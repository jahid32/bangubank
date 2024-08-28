<?php
namespace App\Controllers;

class PageController extends Controller
{
    public function index(){
       return $this->views("page/index");
    }

    public function login(){
       return $this->views("page/login");
    }
}