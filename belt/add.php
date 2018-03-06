<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$belt = new belt();

$site->starthead();
$site->backmenu();
$belt->addbelt();

ob_end_flush();
?>
