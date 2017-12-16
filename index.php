<?php
require_once 'config\Loader.php';
spl_autoload_register('loader::loaderRoot');

ob_start();
session_start();

$site = new viewsite();
$belt = new belt();


$site->starthead();

$belt->viewbelt();
$belt->deletebelt();
$belt->editbelt();

$site->endhead();


ob_end_flush();

?>





