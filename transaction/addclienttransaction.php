<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$site->starthead();

$idbelttransaction = new transaction();
$idbelttransaction->addbelttransaction();

$idclient = $_GET['id_client'];
echo $idclient;




ob_end_flush();

?>
