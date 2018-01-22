<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$transaction = new transaction();
$transaction->addtransaction();

ob_end_flush();
?>
