<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$viewuser = new user();

$site->starthead();

$viewuser->viewuser();


$site->endhead();
ob_end_flush();
?>