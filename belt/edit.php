<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$belt = new belt();

if (isset($_SESSION['access']))

{
    if ($_SESSION['access'] >= 1)
    {
        $site->starthead();
        $site->backmenu();
        $belt->editbelt();
        $site->endhead();
    }
    else
    {
        $site->error();
    }
}

else

{
    $site->error();
}


ob_end_flush();
?>