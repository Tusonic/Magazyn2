<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$edituser = new user();

if (isset($_SESSION['access']))

{
    if ($_SESSION['access'] >= 3)
    {
        $site->starthead();
        $site->backmenu();
        $edituser->edituser();
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