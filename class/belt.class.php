<?php

class belt extends database
{


    public function viewbelt()
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

                </tr>
                            ';

        }

        echo '
        
                  </tbody>
               </table>
        
         ';


    }

    public function deletebelt()
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
                                    <form method="POST" action="belt/deleteBelt.php">
                                    <input type="hidden" value="' . $row['id'] . '" name="id"/>
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

    public function editbelt()
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
                                    <form method="POST" action="belt/EditBelt.php">
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

    public function editorbelt()
    {

        // debuger
        echo $_POST['id'];
        // debuger

        $viewBelt = $this->pdo->prepare("select * from belt where ID = :value");
        $viewBelt->execute(array(':value' => $_POST['id']));


        echo ' 
 
            <table class="table">
                 <thead>
                       <tr> 
                             <th scope="col">#</th>
                             <th scope="col">Length</th>
                             <th scope="col">Width</th>
                             <th scope="col">Type</th>
                             <th scope="col"></th>
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
                 <tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $length . '</td>
                            <td>' . $width . '</td>
                            <td>' . $type . '</td>

                </tr>
                
                
                
            <form method="POST" action="editbeltchange.php">
            
                <tr>
                            <th scope="row"> 
                            # 
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
                                    <input type="submit" class="btn btn-info" value="Edit ID=' . $row['id'] . '"/> 
                            </td>
 
                </tr>
            </form>                    
            
                            ';

        }



        echo '
        
                  </tbody>
               </table>
        
         ';


    }

    public function checkeditorbelt()
    {



        if (!empty($_POST["length"]) || ($_POST["width"]) || ($_POST["type"]) )
        {

            echo "Yes, POST is set </br>";
            $z0 = $_POST["id"];
            $z1 = $_POST["length"];
            $z2 = $_POST["width"];
            $z3 = $_POST["type"];



            if (empty($z1))
            {
                echo 'z1 to null';

                echo '
            <form method="POST" action="editbelt.php">
            <input type="hidden" value="' .$z0. '" name="id"/>
            <input type="submit" class="btn btn-info" value="Edit ID=' . $z0 . '"/>
            </form>
            
            ';

            }

            if (empty($z2))
            {
                echo 'z2 to null';
            }

            if (empty($z2))
            {
                echo 'z2 to null';
            }
            echo"$z0";
            echo"$z1";
            echo"$z2";
            echo"$z3";
        }

        else
        {
            echo "N0, mail is not set";
            $z1 = $_POST["length"];
            echo"$z1";
        }



    }

}




