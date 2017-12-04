<?php ob_start();
session_start();


class Belt extends Database {


    public function viewBelt()
    {
        $viewBelt = $this->pdo->prepare('select * from belt');
        $viewBelt->execute();

        echo' 
 
            <table class="table">
                 <thead>
                       <tr> 
                             <th scope="col">#</th>
                             <th scope="col">Length</th>
                             <th scope="col">Width</th>
                             <th scope="col">Type</th>
                        </tr>
                   </thead>
                <tbody>
                   
  
         ';

        while ($row = $viewBelt->fetch(PDO::FETCH_ASSOC))
        {
            $id = $row['id'];
            $length = $row['length'];
            $width = $row['width'];
            $type = $row['type'];

            echo'
                <tr>
                    <th scope="row">'.$id.'</th>
                    <td>'.$length.'</td>
                    <td>'.$width.'</td>
                    <td>'.$type.'</td>
                </tr>
            ';

        }

        echo'
        
                  </tbody>
               </table>
        
         ';

    }


    public function confBelt()
    {
        $viewBelt = $this->pdo->prepare('select * from belt');
        $viewBelt->execute();

        echo' 
 
            <table class="table">
                 <thead>
                       <tr> 
                             <th scope="col">#</th>
                             <th scope="col">Length</th>
                             <th scope="col">Width</th>
                             <th scope="col">Typee</th>
                             <th scope="col">Edit</th>
                             <th scope="col">Delete</th>
                        </tr>
                   </thead>
                <tbody>
                   
  
         ';

        while ($row = $viewBelt->fetch(PDO::FETCH_ASSOC))
        {
            $id = $row['id'];
            $length = $row['length'];
            $width = $row['width'];
            $type = $row['type'];



            echo'
                <tr>
                    <th scope="row">'.$id.'</th>
                    <td>'.$length.'</td>
                    <td>'.$width.'</td>
                    <td>'.$type.'</td>
                    <td>    
                             <a href="deleteBelt.php?id='.$row['id']. '">DeleteGET</a>
                    </td>
                    <td>
                            <form method="POST" action="deleteBelt.php">
                            <input type="hidden" value="' .$row['id'].'" name="id"/>
                            <input type="submit" class="btn btn-info" value="Remove21"/>
                            </form>
                   </td>
                </tr>
            ';

        }

        echo'
        
                  </tbody>
               </table>
        
         ';



    }


    public function editBelt()
    {

        $viewBelt = $this->pdo->prepare('select * from belt');
        $viewBelt->execute();

        echo' 
 
            <table class="table">
                 <thead>
                       <tr> 
                             <th scope="col">#</th>
                             <th scope="col">Length</th>
                             <th scope="col">Width</th>
                             <th scope="col">Typee</th>
                             <th scope="col">Edit</th>
                             <th scope="col">Delete</th>
                        </tr>
                   </thead>
                <tbody>
                   
  
         ';

        while ($row = $viewBelt->fetch(PDO::FETCH_ASSOC))
        {
            $id = $row['id'];
            $length = $row['length'];
            $width = $row['width'];
            $type = $row['type'];



            echo'
                <tr>
                    <th scope="row">'.$id.'</th>
                    <td>'.$length.'</td>
                    <td>'.$width.'</td>
                    <td>'.$type.'</td>
                    <td>    
                             <a href="editBelt.php?id='.$row['id'].'">DeleteGET</a>
                    </td>
                    <td>
                            <form method="POST" action="deleteBelt.php">
                            <input type="hidden" value="'.$row['id'].'" name="id"/>
                            <input type="submit" class="btn btn-info" value="Remove21"/>
                            </form>
                   </td>
                   
                     <td>
                            <form method="POST" action="editBelt.php">
                            <input type="hidden" value="'.$row['id'].'" name="id"/>
                            <input type="submit" class="btn btn-info" value="Edit21"/>
                            </form>
                   </td>
                </tr>
            ';

        }

        echo'
        
                  </tbody>
               </table>
        
         ';





    }



}



ob_end_flush();
?>
