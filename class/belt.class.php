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
                                    <form method="POST" action="belt/deletebelt.php">
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
                                    <form method="POST" action="belt/editbelt.php">
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
                             <th scope="col">Change</th>
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


    }

    public function checkeditorbelt()
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
            $z1 = $_POST["length"];
            echo"$z1";
        }



    }

    public function addbelt()
    {
        echo'
        
  <form>
  
   <div class="row">
   
       <div class="col-md-3 mb-3">
              <label for="validationDefault03">City</label>
              <input type="text" class="form-control" id="validationDefault03" placeholder="City" required>
              <div class="invalid-feedback">Please provide a valid city.</div>
       </div>
   
        <div class="col-md-2 mb-3">
              <label for="validationDefault04">State</label>
              <input type="text" class="form-control" id="validationDefault04" placeholder="State" required>
              <div class="invalid-feedback"> Please provide a valid state.</div>
        </div>
        
        <div class="col-md-2 mb-3">
              <label for="validationDefault05">Zip</label>
              <input type="text" class="form-control" id="validationDefault05" placeholder="Zip" required>
              <div class="invalid-feedback"> Please provide a valid zip. </div>
        </div>
        
        <div class="col-md-2 mb-3">
              <label for="validationDefault05">Zip</label>
              <input type="text" class="form-control" id="validationDefault05" placeholder="Zip" required>
              <div class="invalid-feedback"> Please provide a valid zip. </div>
        </div>
        
    </div>
              <button class="btn btn-primary" type="submit">Submit form</button>
</form>

        
        
        ';

    }

}




