<?php
require_once 'config/loader.php';
spl_autoload_register('loader::loaderRoot');

ob_start();
session_start();

$site = new viewsite();
$belt = new belt();
$client = new client();


$site->starthead();

$belt->viewbelt();
$belt->deletebelt();
$belt->editbelt();

$belt->addbelt();

$client->viewclient();
$client->deleteclient();
$client->editclient();

$client->addclient();

$user = new user();
$user->viewuser();
$user->deleteuser();




$site->endhead();


ob_end_flush();

?>





