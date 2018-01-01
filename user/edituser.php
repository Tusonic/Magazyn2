<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$site->starthead();

$user = new user();
$user->viewuser();
$user->editoruser();

$site->endhead();

ob_end_flush();
?>