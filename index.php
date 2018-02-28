<?php
require_once 'config/loader.php';
spl_autoload_register('loader::loaderRoot');

ob_start();
session_start();

$site = new viewsite();

// START CODE CHECK LOG_IN
    if (isset($_SESSION['login_in'])) {

        if ($_SESSION['login_in'] = 1) {
            $set_login = 1;
            $site->setlogin($set_login);
        } else {
            $set_login = 0;
            $site->setlogin($set_login);
        }
    }
    else {
        $set_login = 0;
        $site->setlogin($set_login);
    }
// END CODE CHECK LOG_IN

$site->starthead();
$site->menu();
$site->login();

$site->getlogin();

$site->endhead();
ob_end_flush();
?>





