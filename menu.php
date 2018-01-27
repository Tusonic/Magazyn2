<?php
require_once 'config/loader.php';
spl_autoload_register('loader::loaderRoot');

ob_start();
session_start();

$site = new viewsite();
$site->starthead();

$site->endhead();

ob_end_flush();

?>





