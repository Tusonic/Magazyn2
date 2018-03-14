<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$client = new client();

$site->starthead();
$site->backmenu();
$client->deleteclientdata();
$site->endhead();

ob_end_flush();
?>