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
                             <th scope="col">Type</th>
                             <th scope="col">Length</th>
                             <th scope="col">Width</th>
                             <th scope="col">Name</th>
                             <th scope="col">Login</th>
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
            $name = $row['9'];
            $login = $row['13'];


            echo '

                <tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $type . '</td>
                            <td>' . $length . '</td>
                            <td>' . $width . '</td>
                            <td>' . $name . '</td>
                            <td>' . $login . '</td>

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
                                    <input type="submit" class="btn btn-info" value="ADD CLIENT"/>
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

        $viewBelt = $this->pdo->prepare('select * from belt');
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
                             <th scope="col">Delete</th>
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
                                    <input type="submit" class="btn btn-info" value="ADD BELT"/>
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

        $addtransaction = $this->pdo->prepare("INSERT INTO transaction (user, belt, client) VALUES (:user,:belt,:client)");
        $addtransaction->bindValue(':user', $iduser, PDO::PARAM_INT);
        $addtransaction->bindValue(':belt', $idbelt, PDO::PARAM_INT);
        $addtransaction->bindValue(':client', $idclient, PDO::PARAM_INT);
        $addtransaction->execute();

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
                             <th scope="col">Length</th>
                             <th scope="col">Width</th>
                             <th scope="col">Type</th>
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

            echo "Yes, POST is set </br>";
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
                echo 'change OK';
                echo $id;
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
        // CHECK DELETE ID
        // echo '</br> post=';
        // echo $deletetransactionid;

        $editorBelt = $this->pdo->prepare("DELETE FROM transaction WHERE id=:id");
        $editorBelt->bindValue(':id', $deletetransactionid, PDO::PARAM_INT);
        $editorBelt->execute();

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
                             <th scope="col">Type</th>
                             <th scope="col">Length</th>
                             <th scope="col">Width</th>
                             <th scope="col">Name</th>
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
            $name = $row['9'];
            $login = $row['13'];


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
