<?php

require __DIR__ . '/vendor/autoload.php';

use App\Storage\FileStorage;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uriSegments = explode('/', trim($uri, '/'));

session_start();

if ($uriSegments[0] === 'register') {
    $storage = new FileStorage(__DIR__ . '/data/users.json');
    $controller = new RegisterController($storage);
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $controller->store();
    }else{
      $controller->index();
    }
}elseif ($uriSegments[0] === 'login') {
  $controller = new LoginController($storage);
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $controller->login();
  }else{
    $controller->index();
  }
}
else {
   include __DIR__ . '/views/index.view.php';
}
