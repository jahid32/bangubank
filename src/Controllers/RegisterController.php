<?php
namespace App\Controllers;

use App\Models\User;
use App\Storage\StorageInterface;
class RegisterController {

  private $userModel;

  public function __construct(StorageInterface $storage)
  {
    $this->userModel = new User($storage);
  }
  public function index(){
    include __DIR__ . '/../../views/register.view.php';
  }

  public function store() {
    $data = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        'balance' => 0
    ];
    if($this->userModel->findByEmail($data['email'])) {
      echo 'User with this email already exists';
      return;
    }
    $this->userModel->save( $data);
    header('Location: /login');
  }
}

