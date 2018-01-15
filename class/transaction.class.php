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
        while ($row = $viewBelt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $type = $row['type'];
            $length = $row['length'];
            $width = $row['width'];
            $name = $row['name'];
            $login = $row['login'];


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




}
