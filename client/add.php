<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$client = new client();

if (isset($_SESSION['access']))

{
    if ($_SESSION['access'] >= 1)
    {
        $site->starthead();
        $site->backmenu();
        $client->addclient();
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
