<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$edituser = new user();

$site->starthead();
$edituser->edituser();


$site->endhead();
ob_end_flush();
?>