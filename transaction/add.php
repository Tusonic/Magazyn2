<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$site->starthead();

$id_user = 3; // login system


if ($id_user == 3)
{


    if ( (isset($_GET['id_belt'])) && (isset($_GET['id_client']))  ) // 3
    {
        $addtransaction3 = new transaction();
        $addtransaction3->addtransaction();

    }

    if ( (empty($_GET['id_belt'])) && (isset($_GET['id_client']))  ) // 2
    {

        $addtransaction2 = new transaction();
        $addtransaction2->addbelttransaction();

    }

    if ( (empty($_GET['id_belt'])) && (empty($_GET['id_client']))  ) // 1
    {

        $addtransaction1 = new transaction();
        $addtransaction1->addclinettransaction();

    }

}

else
{
    echo 'login error';
}

//$idbelt = $_GET['id_belt'];
//echo $idbelt;


//$addtransaction = new transaction();
//$addtransaction->addclinettransaction();

$site->starthead();



ob_end_flush();
?>

<!--

SELECT *
FROM transaction
INNER JOIN belt ON transaction.belt = belt.id
INNER JOIN client ON transaction.client = client.id
INNER JOIN user ON transaction.user = user.id

SELECT transaction.id, belt.type, belt.length, belt.width, client.name, user.login
FROM transaction
INNER JOIN belt ON transaction.belt = belt.id
INNER JOIN client ON transaction.client = client.id
INNER JOIN user ON transaction.user = user.id
ORDER BY transaction.id ASC


-->
