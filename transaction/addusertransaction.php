<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();


$idbelt = $_GET['id_belt'];
echo $idbelt;

$idclient = $_GET['id_client'];
echo $idclient;

$iduser = 44;


ob_end_flush();

?>
