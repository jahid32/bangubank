<?php
namespace App\Models;

use App\Models\Model;
class User extends Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function getAll() {
    $stmt = $this->db->prepare("SELECT * FROM wp_users");
    $stmt->execute();
    return $stmt->fetchAll();
  }
}

