<?php
namespace App\Controllers;

use Symfony\Component\HttpFoundation\Response;
class Controller
{
 public function views (string $view, $data = []){
   extract($data);
   require __DIR__ . "/../../views/{$view}.php";
 }
}
