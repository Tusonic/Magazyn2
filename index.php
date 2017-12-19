<?php
require_once 'config/loader.php';
spl_autoload_register('loader::loaderRoot');

ob_start();
session_start();

$site = new viewsite();
$belt = new belt();


$site->starthead();

$belt->viewbelt();
$belt->deletebelt();
$belt->editbelt();
$belt->editorbelt();


$site->endhead();


ob_end_flush();

?>





