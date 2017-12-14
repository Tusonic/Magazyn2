<?php

echo 'tomek14';

require 'belt.class.php';
require 'conf.class.php';


class edit extends Database {


public $post2;

    public function editBeltTest()
    {
        echo '</br>testEditBelt434</br>';


        $post2 = $_POST['id'];
        echo $post2;


        echo '</br> test </br>';
        echo $_POST['id'];


    }


    public function editBelt()

    {



        echo '</br> test klasy edit belt!!!';
        echo $_POST['id'];

        $a = $_POST['id'];
        echo $a;


        $viewBelt = $this->pdo->prepare("select * from belt WHERE id = '$a' ");
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


}


$edit1 = new edit();
$edit1->editBeltTest();
$edit1->editBelt();


?>

