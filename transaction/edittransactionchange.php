<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$transaction = new transaction();

$site->starthead();
$transaction->edittransactionchange();
$site->endhead();

ob_end_flush();
?>