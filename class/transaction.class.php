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
 
            <table class="table">
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
 
            <table class="table">
                 <thead>
                       <tr> 
                             <th scope="col">#</th>
                             <th scope="col">Name</th>
                             <th scope="col">Adres</th>
                             <th scope="col">Note</th>
                             <th scope="col">Delete</th>
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
                                    <input type="submit" class="btn btn-info" value="Client ADD ID=' . $row['id'] . '"/>
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
 
            <table class="table">
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
                                    <input type="submit" class="btn btn-info" value="Belt ID=' . $row['id'] . '"/>
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
        echo $idclient;

        $idbelt = $_GET['id_belt'];
        echo $idbelt;

        $iduser = 2;
        echo $iduser; //login account


        $addtransaction = $this->pdo->prepare("INSERT INTO transaction (user, belt, client) VALUES (:user,:belt,:client)");
        $addtransaction->bindValue(':user', $iduser, PDO::PARAM_INT);
        $addtransaction->bindValue(':belt', $idbelt, PDO::PARAM_INT);
        $addtransaction->bindValue(':client', $idclient, PDO::PARAM_INT);
        $addtransaction->execute();


    } //third

    public function edittransaction()
    {


        $viewBelt = $this->pdo->prepare('select * from transaction');
        $viewBelt->execute();


        echo ' 
 
            <table class="table">
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
                                    <input type="submit" class="btn btn-info" value="Edit ID=' . $row['id'] . '"/>
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
            $length = $row['user'];
            $width = $row['belt'];
            $type = $row['client'];


            echo '


                
                
            <form method="POST" action="editbeltchange.php">
            
                <tr>
                            <th scope="row"> 
                            ' . $id . '
                            <input type="hidden" value="' . $row['id'] . '" name="id"/>
                            </th>
                            
                            <td>
                                <input  name="length" class="form-control" type="text"  value="'.$length.'" placeholder=" ' . $length . ' ">
                             
                            </td>
                            
                            <td>
                                <input name="width" class="form-control" type="text" value="' . $width . '" placeholder=" ' . $width . '">
                            </td>
                            
                            <td>
                                <input name="type" class="form-control" type="text" value="' . $type . '" placeholder=" ' . $type . '">
                            </td>
                            
                            <td>
                                <input type="submit" class="btn btn-info" value="Change ID=' . $row['id'] . '"/> 
                            </td>
             </form>  
                    
            <form method="POST" action="deletebelt.php">
                            <td>  
                                    <input type="submit" class="btn btn-info" value="Delete ID=' . $row['id'] . '"/>
                                    <input type="hidden" value="' . $row['id'] . '" name="id"/>
                                    
                                    
                                    
                            </td>
            </form> 
            
                </tr>
                            
            
                            ';

        }



        echo '
        
                  </tbody>
               </table>
        
         ';


    } // poprawiać (!)

    public function edittransactionchange()
    {



        if (!empty($_POST["length"]) || ($_POST["width"]) || ($_POST["type"]) )
        {

            echo "Yes, POST is set </br>";
            $beltid = $_POST["id"];
            $beltlength = $_POST["length"];
            $beltwidth = $_POST["width"];
            $belttype = $_POST["type"];

            /* Check varible editor */

            if ( (empty($beltlength)) || (empty($beltwidth)) || (empty($belttype)) )
            {

                if (empty($beltlength)) {
                    echo ' 
                            <form method="POST" action="editbelt.php">
                            <input type="hidden" value="' . $beltid . '" name="id"/>
                            <input type="submit" class="btn btn-info" value="BackEdit ID=' . $beltid. '"/>
                            </form>
                        
                        ';  }

                if (empty($beltwidth)) {
                    echo '
                            <form method="POST" action="editbelt.php">
                            <input type="hidden" value="' . $beltid . '" name="id"/>
                            <input type="submit" class="btn btn-info" value="BackEdit ID=' . $beltid . '"/>
                            </form>
                            
                        '; }

                if (empty($belttype)) {
                    echo '
                            <form method="POST" action="editbelt.php">
                            <input type="hidden" value="' . $beltid . '" name="id"/>
                            <input type="submit" class="btn btn-info" value="BackEdit ID=' . $beltid . '"/>
                            </form>
                        
                        '; }

            }

            else
            {
                $editorBelt = $this->pdo->prepare("UPDATE belt SET id = :id, length=:length, width = :width, type = :type WHERE belt.id = :id");
                $editorBelt->bindValue(':id', $beltid, PDO::PARAM_INT);
                $editorBelt->bindValue(':length', $beltlength, PDO::PARAM_INT);
                $editorBelt->bindValue(':width', $beltwidth, PDO::PARAM_INT);
                $editorBelt->bindValue(':type', $belttype, PDO::PARAM_STR);
                $editorBelt->execute();
                echo 'change OK';
                echo $beltid;
            }

        }

        else
        {
            echo "N0, mail is not set";
        }



    } // poprawiać (!)

    // public function delete !!!




}
