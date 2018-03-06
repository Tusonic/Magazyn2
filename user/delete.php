<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$deleteuser = new user();

$site->starthead();
$site->backmenu();
$deleteuser->deleteuser();
$site->endhead();

ob_end_flush();
?>