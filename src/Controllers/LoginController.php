<?php
namespace App\Controllers;


class LoginController {
  private $userModel;

  public function __construct(StorageInterface $storage)
  {
    $this->userModel = new User($storage);
  }
  public function index(){
    include __DIR__ . '/views/login.view.php';
  }

  public function login() {
    $data = [
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ];
    $user = $this->userModel->findByEmail($data['email']);
    if(!$user) {
      echo 'User with this email does not exist';
      return;
    }
    if(!password_verify($data['password'], $user['password'])) {
      echo 'Wrong password';
      return;
    }
    $_SESSION['user'] = $user;
    header('Location: /dashboard');
  }
}
