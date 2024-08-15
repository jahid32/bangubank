<?php
namespace App\Models;

use App\Storage\StorageInterface;
class User {
  private $storage;
  public function __construct(StorageInterface $storage)
  {
    $this->storage = $storage;
  }

  public function save( $data)
  {
    $this->storage->save( $data);
  }

  public function findByEmail($email) {
        return $this->storage->find($email);
    }

}

