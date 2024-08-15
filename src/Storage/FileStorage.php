<?php

use App\Storage\StorageInterface;

class FileStorage implements StorageInterface
{
    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function save($data)
    {
        $items = $this->findAll();
        $items[$data['email']] = $data;
        file_put_contents($this->filePath, json_encode($items, JSON_PRETTY_PRINT));
    }

    public function find($key)
    {
        $items = $this->findAll();
        return isset($items[$key]) ? $items[$key] : null;
    }

    public function findAll()
    {
        if (!file_exists($this->filePath)) {
            return [];
        }
        return json_decode(file_get_contents($this->filePath), true);
    }
}
