<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$viewclient = new client();

$site->starthead();

$viewclient->viewclient();


$site->endhead();
ob_end_flush();
?>