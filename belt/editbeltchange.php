<?php
require_once '..\config\loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$site->starthead();

$belt = new belt();
$belt->checkeditorbelt();


$site->endhead();


ob_end_flush();


