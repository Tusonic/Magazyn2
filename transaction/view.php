<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$viewtransaction = new transaction();

$site->starthead();

$viewtransaction->viewtransaction();


$site->endhead();
ob_end_flush();
?>