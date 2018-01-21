<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$site->starthead();

$deletetransaction = new transaction();
$deletetransaction->deletetransaction();


$site->endhead();
ob_end_flush();
?>