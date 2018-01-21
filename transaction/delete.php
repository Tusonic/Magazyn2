<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$site->starthead();

$delete = new transaction();
$delete->delete();

$site->endhead();
ob_end_flush();
?>