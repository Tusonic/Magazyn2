<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$user = new user();

$site->starthead();
$site->backmenu();
$user->checkeditoruser();

$site->endhead();

ob_end_flush();
?>

