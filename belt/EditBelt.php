<?php
require_once '..\config\loader.php';
spl_autoload_register('loader::loaderDir');


ob_start();
session_start();


$belt = new belt();
$belt->viewbelt();
$belt->editorbelt();


ob_end_flush();
?>