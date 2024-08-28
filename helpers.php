<?php
use Symfony\Component\HttpFoundation\Response;
function view(string $view, $data = []) {
    extract($data);
    require __DIR__ . "/views/{$view}.php";
}

function redirect($location, $status = 201) {
    header("Location: {$location}", true, $status);
    exit;
}

