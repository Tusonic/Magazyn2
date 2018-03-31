<?php
header('Content-type: text/html; charset=utf8');

require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

$site = new viewsite();
$site->starthead();


if (isset($_SESSION['access']))

{
    if ($_SESSION['access'] >= 3)
    {
        // ---- START --- //

        try{
            // CONFIG
            $dbName = 'kazik123_magazyn';
            $dbHost = '192.168.101.134';
            $dbUser = 'kazik123_user';
            $dbPass = 'kazik123_pass';

            $backupsDir = '../database';


            $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sqlResult = $pdo -> query("SHOW tables FROM $dbName");


            $sqlData = "-- Data wykonania kopii: ".date('d.m.Y')." r. o godzinie ".date('H:i')."
    -- Baza: $dbName
    SET SQL_MODE=\"NO_AUTO_VALUE_ON_ZERO\";";

            while ($queryTable = $sqlResult -> fetch(PDO::FETCH_ASSOC)){
                $sqlTable = $queryTable['Tables_in_'.$dbName];
                $sqlResultB = $pdo -> query("SHOW CREATE TABLE $sqlTable");
                $queryTableInfo = $sqlResultB -> fetch(PDO::FETCH_ASSOC);


                $sqlData .= "\n\n--
        -- Struktura dla tabeli `$sqlTable`
        --\n\n";
                $sqlData .= $queryTableInfo['Create Table'] . ";\n";
                $sqlData .= "\n\n--
        -- Wartości tabeli `$sqlTable`
        --\n\n";

                $sqlResultC = $pdo -> query("SELECT * FROM $sqlTable");


                while ($queryRecord = $sqlResultC -> fetch(PDO::FETCH_ASSOC)) {
                    $sqlData .= "INSERT INTO `$sqlTable` VALUES (";
                    $sqlRecord = '';
                    foreach( $queryRecord as $sqlField => $sqlValue ) {
                        $sqlRecord .= "'$sqlValue',";
                    }
                    $sqlData .= substr($sqlRecord, 0, -1);
                    $sqlData .= ");\n";
                }
            }


            file_put_contents($backupsDir.'/backup_'.$dbName.'_'.date('d_m_Y').'.sql', $sqlData);

            // START - successful backup

            echo '

        </br></br></br>

            <div class="row">
            
                <div class="col-md-3">
                </div>
                
                <div class="col-md-6">
                    <div class="alert alert-success text-center" role="alert">
                        <h4 class="alert-heading">BACKUUP!</h4>
                             <p class="text-center">The backup has been successfully copy!</p>
                             <p><a class="btn btn-success btn-lg btn-block" href="../index.php" role="button">OK &raquo;</a></p>
                     </div>
                </div>
                    
                <div class="col-md-3">
                    
                </div>
            
            </div>


     

            ';

            // END - successful backup
        }

        catch(PDOException $e){
            echo 'Połączenie nie mogło zostać utworzone: '.$e->getMessage();
        }

// ---- END --- //
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

$site->endhead();

?>