<?php

class transaction extends database
{
    public function viewtransaction()
    {


        $viewBelt = $this->pdo->prepare('
        SELECT *
FROM transaction
INNER JOIN belt ON transaction.belt = belt.id
INNER JOIN client ON transaction.client = client.id
INNER JOIN user ON transaction.user = user.id
        
        ');
        $viewBelt->execute();


        echo ' 
 
        <h3><p class="text-center">View Transaction</p></h3></br>
 
            <table id="table-full" class="table table-striped table-bordered" width="100%" cellspacing="0">
                 <thead>
                       <tr> 
                             <th scope="col">#</th>
                             <th scope="col">Belt Type</th>
                             <th scope="col">Belt Length</th>
                             <th scope="col">Belt Width</th>
                             <th scope="col">Client</th>
                             <th scope="col">Login</th>
                             <th scope="col">Data</th>
                        </tr>
                   </thead>
                <tbody>
                   
  
         ';

                                                // ASSOC or NUM
        while ($row = $viewBelt->fetch(PDO::FETCH_NUM)) {
            $id = $row['0'];
            $type = $row['8'];
            $length = $row['6'];
            $width = $row['7'];
            $name = $row['12'];
            $login = $row['17'];
            $date = $row['4'];


            echo '

                <tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $type . '</td>
                            <td>' . $length . '</td>
                            <td>' . $width . '</td>
                            <td>' . $name . '</td>
                            <td>' . $login . '</td>
                            <td>' . $date . '</td>

                </tr>
                            ';

        }

        echo '
        
                  </tbody>
               </table>
        
         ';


    }

    public function addclinettransaction()
    {

        $viewBelt = $this->pdo->prepare('select * from client');
        $viewBelt->execute();

        echo ' 
 
        <h3><p class="text-center">ADD A CLIENT FOR TRANSACTION</p></h3></br>
 
            <table id="table-full" class="table table-striped table-bordered" width="100%" cellspacing="0">
                 <thead>
                       <tr> 
                             <th scope="col">#</th>
                             <th scope="col">Name</th>
                             <th scope="col">Adres</th>
                             <th scope="col">Note</th>
                             <th scope="col">Add Client</th>
                        </tr>
                   </thead>
                <tbody>
                   
          ';


        while ($row = $viewBelt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $name = $row['name'];
            $adres = $row['adres'];
            $note = $row['note'];


            echo '

                <tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $name . '</td>
                            <td>' . $adres . '</td>
                            <td>' . $note . '</td>
                            <td>
                                    <form method="GET" action="add.php?id_client=' . $row['id'] . '">
                                    <input type="hidden" value="' . $row['id'] . '" name="id_client"/>
                                    <input type="submit" class="btn btn-info" value="Add"/>
                                    </form>
                           </td>
                </tr>
                            ';

        }

        echo '
        
                  </tbody>
               </table>
        
         ';


    } //firts

    public function addbelttransaction()
    {

        $viewBelt = $this->pdo->prepare('select * from belt where available = 0');
        $viewBelt->execute();

        echo ' 
 
        <h3><p class="text-center">ADD A BELT FOR THE TRANSACTION</p></h3></br>
 
            <table id="table-full" class="table table-striped table-bordered" width="100%" cellspacing="0">
                 <thead>
                       <tr> 
                             <th scope="col">#</th>
                             <th scope="col">Length</th>
                             <th scope="col">Width</th>
                             <th scope="col">Type</th>
                             <th scope="col">Add Belt</th>
                        </tr>
                   </thead>
                <tbody>
                   
  
         ';

        while ($row = $viewBelt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $length = $row['length'];
            $width = $row['width'];
            $type = $row['type'];


            echo '

                <tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $length . '</td>
                            <td>' . $width . '</td>
                            <td>' . $type . '</td>
                            <td>
                                    <form method="GET" action="add.php?id_client=' . $_GET['id_client'] . '&id_belt=' . $row['id'] . '">
                                    <input type="hidden" value="' . $_GET['id_client'] . '" name="id_client"/>
                                    <input type="hidden" value="' . $row['id'] . '" name="id_belt"/>
                                    <input type="submit" class="btn btn-info" value="Add"/>
                                    </form>
                           </td>
                </tr>
                            ';

        }

        echo '
        
                  </tbody>
               </table>
        
         ';


    } //second

    public function addtransaction()
    {

        $idclient = $_GET['id_client'];
        // echo $idclient;

        $idbelt = $_GET['id_belt'];
        // echo $idbelt;

        $iduser = $_SESSION['login'];
        // echo $iduser;

     // SKRYPT DO SCIAGNIECIA ID PO LOGOWANIU !!!
        $getuserid = $this->pdo->prepare("SELECT * FROM user WHERE login = :getuserid ");
        $getuserid->bindValue(':getuserid', $iduser, PDO::PARAM_STR);
        $getuserid ->execute();
        $row = $getuserid->fetch(PDO::FETCH_ASSOC);
        $getidusersesion = $row['id'];
        //echo $getidusersesion;



        $addtransaction = $this->pdo->prepare("INSERT INTO transaction (user, belt, client) VALUES (:user,:belt,:client)");
        $addtransaction->bindValue(':user', $getidusersesion, PDO::PARAM_INT);
        $addtransaction->bindValue(':belt', $idbelt, PDO::PARAM_INT);
        $addtransaction->bindValue(':client', $idclient, PDO::PARAM_INT);
        $addtransaction->execute();

        $addtransactioneditbelt = $this->pdo->prepare("UPDATE belt SET available = 1 WHERE belt.id = :id");
        $addtransactioneditbelt->bindValue(':id', $idbelt, PDO::PARAM_INT);
        $addtransactioneditbelt->execute();

        $addtransactioneditclient = $this->pdo->prepare("UPDATE client SET flag = 1 WHERE client.id = :id");
        $addtransactioneditclient->bindValue(':id', $idclient, PDO::PARAM_INT);
        $addtransactioneditclient->execute();

        $addtransactionedituser = $this->pdo->prepare("UPDATE user SET flag = 1 WHERE user.id = :id");
        $addtransactionedituser->bindValue(':id', $getidusersesion, PDO::PARAM_INT);
        $addtransactionedituser->execute();




        // START - successful add

        echo '

<div class="row">

    <div class="col-md-3">
    </div>
    
    <div class="col-md-6">
        <div class="alert alert-success text-center" role="alert">
            <h4 class="alert-heading">Well done!</h4>
                 <p class="text-center">The transaction has been successfully added!</p>
                 <p><a class="btn btn-success btn-lg btn-block" href="../index.php" role="button">OK &raquo;</a></p>
         </div>
    </div>
        
    <div class="col-md-3">
        
    </div>

</div>


     

            ';

        // END - successful add




    } //third

    public function edittransaction()
    {


        $viewBelt = $this->pdo->prepare('select * from transaction');
        $viewBelt->execute();


        echo ' 
        <h3><p class="text-center">Edit Transaction</p></h3></br>
        
             <table id="table-full" class="table table-striped table-bordered" width="100%" cellspacing="0">
                 <thead>
                       <tr> 
                             <th scope="col">#</th>
                             <th scope="col">ID User</th>
                             <th scope="col">ID Belt</th>
                             <th scope="col">ID Client</th>
                             <th scope="col">Edit</th>
                        </tr>
                   </thead>
                <tbody>
                   
  
         ';


        while ($row = $viewBelt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $iduser = $row['user'];
            $idbelt = $row['belt'];
            $idclient = $row['client'];


            echo '

                <tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $iduser . '</td>
                            <td>' . $idbelt . '</td>
                            <td>' . $idclient . '</td>
                            <td>
                                    <form method="POST" action="edittransaction.php">
                                    <input type="hidden" value="' . $row['id'] . '" name="id"/>
                                    <input type="submit" class="btn btn-info" value="Edit"/>
                                    </form>
                           </td>

                </tr>
                            ';

        }

        echo '
        
                  </tbody>
               </table>
        
         ';


    }

    public function editortransaction()
    {

        $viewBelt = $this->pdo->prepare("select * from transaction where ID = :value");
        $viewBelt->execute(array(':value' => $_POST['id']));

        echo ' 
 
            <table class="table">
                 <thead>
                       <tr> 
                             <th scope="col">#</th>
                             <th scope="col">ID.User</th>
                             <th scope="col">ID.Belt</th>
                             <th scope="col">ID.Client</th>
                             <th scope="col">Change</th>
                             <th scope="col">Delete</th>
                        </tr>
                   </thead>
                <tbody>
                   
  
         ';


        while ($row = $viewBelt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $iduser = $row['user'];
            $idbelt = $row['belt'];
            $idclient = $row['client'];


            echo '


                
                
            <form method="POST" action="edittransactionchange.php">
            
                <tr>
                            <th scope="row"> 
                            ' . $id . '
                            <input type="hidden" value="' . $row['id'] . '" name="id"/>
                            </th>
                                <td>
                                    <input  name="iduser" class="form-control" type="text"  value="'.$iduser.'" placeholder=" ' . $iduser . ' ">
                                </td>
                                <td>
                                    <input name="idbelt" class="form-control" type="text" value="' . $idbelt . '" placeholder=" ' . $idbelt . '">
                                </td>
                                <td>
                                    <input name="idclient" class="form-control" type="text" value="' . $idclient . '" placeholder=" ' . $idclient . '">
                                </td>
                                <td>
                                    <input type="submit" class="btn btn-info" value="Change"/> 
                                </td>
             </form>  
                    
            <form method="POST" action="deletetransaction.php">
                            <td>  
                                    <input type="hidden" value="' . $row['id'] . '" name="id"/>
                                    <input type="submit" class="btn btn-info" value="Delete"/>
                            </td>
            </form> 
                </tr>
                            
            
                            ';

        }



        echo '
        
                  </tbody>
               </table>
        
         ';


    }

    public function edittransactionchange()
    {

        if (!empty($_POST["iduser"]) || ($_POST["idbelt"]) || ($_POST["idclient"]) )
        {

            // CHECK POST
            // echo "Yes, POST is set </br>";
            $id = $_POST["id"];
            $iduser = $_POST["iduser"];
            $idbelt = $_POST["idbelt"];
            $idclient = $_POST["idclient"];

            /* Check varible editor */

            if ( (empty($iduser)) || (empty($idbelt)) || (empty($idclient)) )
            {

                if (empty($iduser)) {
                    echo ' 
                            <form method="POST" action="edittransaction.php">
                            <input type="hidden" value="' . $id . '" name="id"/>
                            <input type="submit" class="btn btn-info" value="BackEdit ID=' . $id . '"/>
                            </form>
                        
                        ';  }

                if (empty($idbelt)) {
                    echo '
                            <form method="POST" action="edittransaction.php">
                            <input type="hidden" value="' . $id . '" name="id"/>
                            <input type="submit" class="btn btn-info" value="BackEdit ID=' . $id . '"/>
                            </form>
                            
                        '; }

                if (empty($idclient)) {
                    echo '
                            <form method="POST" action="edittransaction.php">
                            <input type="hidden" value="' . $id . '" name="id"/>
                            <input type="submit" class="btn btn-info" value="BackEdit ID=' . $id. '"/>
                            </form>
                        
                        '; }

            }

            else
            {
                $editorBelt = $this->pdo->prepare("UPDATE transaction SET id = :id, user=:user, belt=:belt, client=:client WHERE id = :id");
                $editorBelt->bindValue(':id', $id, PDO::PARAM_INT);
                $editorBelt->bindValue(':user', $iduser, PDO::PARAM_INT);
                $editorBelt->bindValue(':belt', $idbelt, PDO::PARAM_INT);
                $editorBelt->bindValue(':client', $idclient, PDO::PARAM_INT);
                $editorBelt->execute();

                // CHECK CHANGE
                // echo 'change OK';
                // echo $id;

                // START - successful add

                echo '

            </br>

            <div class="row">
            
                <div class="col-md-3">
                </div>
                
                <div class="col-md-6">
                    <div class="alert alert-success text-center" role="alert">
                        <h4 class="alert-heading">Added!</h4>
                             <p class="text-center">The transaction has been successfully added!</p>
                             <p><a class="btn btn-success btn-lg btn-block" href="../index.php" role="button">OK &raquo;</a></p>
                     </div>
                </div>
                    
                <div class="col-md-3">
                    
                </div>
            
            </div>


     

            ';

                // END - successful add

            }

        }

        else
        {
            echo "N0, mail is not set";
        }

    }

    public function deletetransaction()
    {


        $deletetransactionid = $_POST['id'];
        $beltid = $_POST['beltid'];
        $clientid = $_POST['clientid'];
        $userid = $_POST['userid'];

        // echo $clientid;
        // echo $beltid;
        // CHECK DELETE ID
        // echo '</br> post=';
        // echo $deletetransactionid;



        $editorBelt = $this->pdo->prepare("DELETE FROM transaction WHERE id=:id");
        $editorBelt->bindValue(':id', $deletetransactionid, PDO::PARAM_INT);
        $editorBelt->execute();

        // CHANGE BELT AVALIBLE
        $changetransactioneditbelt = $this->pdo->prepare("UPDATE belt SET available = 0 WHERE belt.id = :id");
        $changetransactioneditbelt->bindValue(':id', $beltid, PDO::PARAM_INT);
        $changetransactioneditbelt->execute();

        // CHANGE CLIENT FLAG + CHECK ID CLIENT FLAG
        $checkidclient = $this->pdo->prepare("SELECT COUNT(client) FROM transaction WHERE client = :clientid");
        $checkidclient->bindValue(':clientid', $clientid, PDO::PARAM_INT);
        $checkidclient->execute();
        $row1 = $checkidclient->fetch(PDO::FETCH_NUM);
        $resultcheckclinetid = $row1['0'];
        echo $resultcheckclinetid;

        $changetransactionclient = $this->pdo->prepare("UPDATE client SET flag = :flag WHERE client.id = :id");
        $changetransactionclient->bindValue(':flag', $resultcheckclinetid, PDO::PARAM_INT);
        $changetransactionclient->bindValue(':id', $clientid, PDO::PARAM_INT);
        $changetransactionclient->execute();

        // CHANGE USER FLAG + CHEC ID USER FLAG
        $checkiduser = $this->pdo->prepare("SELECT COUNT(user) FROM transaction WHERE user = :userid");
        $checkiduser->bindValue(':userid', $userid, PDO::PARAM_INT);
        $checkiduser->execute();
        $row2 = $checkiduser->fetch(PDO::FETCH_NUM);
        $resultcheckuserid = $row2['0'];
        echo $resultcheckuserid;

        $changetransactionuser = $this->pdo->prepare("UPDATE user SET flag = :flag WHERE user.id = :id");
        $changetransactionuser->bindValue(':flag', $resultcheckuserid, PDO::PARAM_INT);
        $changetransactionuser->bindValue(':id', $userid, PDO::PARAM_INT);
        $changetransactionuser->execute();



        // START - successful add

        echo '

            </br>

            <div class="row">
            
                <div class="col-md-3">
                </div>
                
                <div class="col-md-6">
                    <div class="alert alert-success text-center" role="alert">
                        <h4 class="alert-heading">Deleted!</h4>
                             <p class="text-center">The transaction has been successfully deleted!</p>
                             <p><a class="btn btn-success btn-lg btn-block" href="../index.php" role="button">OK &raquo;</a></p>
                     </div>
                </div>
                    
                <div class="col-md-3">
                    
                </div>
            
            </div>


     

            ';

        // END - successful add

    }

    public function delete()
    {


        $viewBelt = $this->pdo->prepare('
        SELECT *
FROM transaction
INNER JOIN belt ON transaction.belt = belt.id
INNER JOIN client ON transaction.client = client.id
INNER JOIN user ON transaction.user = user.id
        
        ');
        $viewBelt->execute();


        echo ' 
        <h3><p class="text-center">Delete Transaction</p></h3></br>
             <table id="table-full" class="table table-striped table-bordered" width="100%" cellspacing="0">
                 <thead>
                       <tr> 
                           <th scope="col">#</th>
                             <th scope="col">Belt Type</th>
                             <th scope="col">Belt Length</th>
                             <th scope="col">Belt Width</th>
                             <th scope="col">Client</th>
                             <th scope="col">Login</th>
                             <th scope="col">Delete</th>
                        </tr>
                   </thead>
                <tbody>
                   
  
         ';

        // ASSOC or NUM
        while ($row = $viewBelt->fetch(PDO::FETCH_NUM)) {
            $id = $row['0'];
            $type = $row['7'];
            $length = $row['5'];
            $width = $row['6'];
            $name = $row['12'];
            $login = $row['17'];
            $beltid = $row['2'];
            $clientid = $row['11'];


            echo '

                <tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $type . '</td>
                            <td>' . $length . '</td>
                            <td>' . $width . '</td>
                            <td>' . $name . '</td>
                            <td>' . $login . '</td>
                            
                             <form method="POST" action="deletetransaction.php">
                            <td>  
                                    <input type="hidden" value="' . $row['0'] . '" name="id"/>
                                    <input type="hidden" value="' . $row['2'] . '" name="beltid"/>
                                    <input type="hidden" value="' . $row['11'] . '" name="clientid"/>
                                    <input type="hidden" value="' . $row['16'] . '" name="userid"/>
                                    
                                    <input type="submit" class="btn btn-info" value="Delete"/>
                                                         
                            </td>
            </form> 

                </tr>
                            ';

        }

        echo '
        
                  </tbody>
               </table>
        
         ';


    }


}

?>
