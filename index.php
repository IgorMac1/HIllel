<?php
require_once __DIR__ . '/vendor/autoload.php';


use Classes\Db;

$db = Db::getInstance();

$arr = $db->getAll("SHOW TABLES FROM homework_13");

if (array_key_exists(0, $arr)) {
    foreach ($arr as $key) {
        foreach ($key as $value) {
            if ($value == 'users') {
                $expression = true;
                break;
            }
        }
    }
} else $expression = false;

require "form.php";

if (isset($_POST['create_table'])) {
    $db->createTable();
    header('location: ' . '/');
}
if (isset($_POST['go'])) {
    $db->addNewUser($_POST);
    header('location: ' . '/');
}
if (isset($_POST['deleteUsers'])) {
    $db->deleteUsers($_POST);
    header('location: ' . '/');
}






