<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$adduser = new user();

$site->starthead();
$site->backmenu();
$adduser->adduser();

ob_end_flush();
?>
