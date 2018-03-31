<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$transaction = new transaction();

if (isset($_SESSION['access']))

{
    if ($_SESSION['access'] >= 2)
    {
        $site->starthead();
        $transaction->edittransactionchange();
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