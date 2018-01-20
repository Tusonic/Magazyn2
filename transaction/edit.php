<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$edittransaction = new transaction();

$site->starthead();

$edittransaction->edittransaction();


$site->endhead();
ob_end_flush();
?>