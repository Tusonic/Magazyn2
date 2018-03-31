<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$adduser = new user();

if (isset($_SESSION['access']))

{
    if ($_SESSION['access'] >= 2)
    {
        $site->starthead();
        $site->backmenu();
        $adduser->adduser();
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
