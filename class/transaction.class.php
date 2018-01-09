<?php

class transaction extends database
{
    public function viewtransaction()
    {


        $viewBelt = $this->pdo->prepare('select * from transaction');
        $viewBelt->execute();


        echo ' 
 
            <table class="table">
                 <thead>
                       <tr> 
                             <th scope="col">#</th>
                             <th scope="col">User</th>
                             <th scope="col">Belt</th>
                             <th scope="col">Client</th>
                        </tr>
                   </thead>
                <tbody>
                   
  
         ';


        while ($row = $viewBelt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $user = $row['user'];
            $belt = $row['belt'];
            $client = $row['client'];


            echo '

                <tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $user . '</td>
                            <td>' . $belt . '</td>
                            <td>' . $client . '</td>

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
                                    <form method="GET" action="transaction/addclienttransaction.php">
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


    }

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
                                    <form method="GET" action="addbelttransaction.php">
                                    <input type="hidden" value="' . $_GET['id_client'] . '" name="id_client"/>
                                    <input type="hidden" value="' . $row['id'] . '" name="id_belt"/>
                                    <input type="submit" class="btn btn-info" value="Delete ID=' . $row['id'] . '"/>
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



}
