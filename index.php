<?php
require_once 'config/loader.php';
spl_autoload_register('loader::loaderRoot');

ob_start();
session_start();

$site = new viewsite();
$belt = new belt();
$client = new client();
$transaction = new transaction();


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
$user->edituser();
$user->adduser();

$transaction->viewtransaction();
$transaction->addclinettransaction();




$site->endhead();


ob_end_flush();

?>





