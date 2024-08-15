<?php
namespace App\Storage;

interface StorageInterface {
    public function save($data);
    public function find($key);
    public function findAll();
}

