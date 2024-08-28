<?php

namespace App\Models;

class Model
{
  protected \PDO $db;
  public function __construct(){
    $config = require __DIR__ . "/../../config/database.php";

    try {
      $this->db = new \PDO("mysql:host=$config[host];dbname=$config[database]", $config["username"], $config["password"]);
      $this->db->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
      $this->db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    } catch (\PDOException $e) {
      echo $e->getMessage();
    }

  }
}
