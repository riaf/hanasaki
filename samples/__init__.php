<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__.'/../src/Hanasaki.php';

function connection()
{
    $pdo = new PDO('mysql:host=localhost;dbname=tmp', 'root', '');

    $hanasaki = new hanasaki\Hanasaki($pdo);

    return $hanasaki;
}

