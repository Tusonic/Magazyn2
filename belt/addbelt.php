<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

$site = new viewsite();
$site->starthead();

$belt = new belt();
$belt->addbeltdata();


ob_start();
session_start();


ob_end_flush();
?>
