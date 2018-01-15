<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$site->starthead();





if ( (isset($_GET['id_belt'])) && (isset($_GET['id_client']))  )
{
    echo 'belt</br>';
    echo 'client</br>';



else
{
    echo 'brak tomek';
}

//$idbelt = $_GET['id_belt'];
//echo $idbelt;


//$addtransaction = new transaction();
//$addtransaction->addclinettransaction();

$site->starthead();



ob_end_flush();
?>
