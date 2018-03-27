<?php
/*
phpinfo();
$date = date("m.d.y H:i:s");
echo $date;
echo '</br>';
echo $date;
*/


require_once 'config/loader.php';
spl_autoload_register('loader::loaderRoot');

$site = new viewsite();
$site->error();

ob_start();
session_start();


?>