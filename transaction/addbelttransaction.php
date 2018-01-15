<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();


$idclinttransaction = new transaction();
$idclinttransaction->addtransaction();


ob_end_flush();

?>
