<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$deleteclint = new client();

$site->starthead();

$deleteclint->deleteclient();


$site->endhead();
ob_end_flush();
?>