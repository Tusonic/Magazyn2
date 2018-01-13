<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$viewbelt = new belt();

$site->starthead();

$viewbelt->viewbelt();


$site->endhead();
ob_end_flush();
?>