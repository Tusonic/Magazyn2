<?php

class belt extends database
{

    public function viewbelt()
    {

        $viewBelt = $this->pdo->prepare('select * from belt');
        $viewBelt->execute();



        echo ' 
 
        <h3><p class="text-center">View Belt</p></h3></br>

            <table id="table-full" class="table table-striped table-bordered" width="100%" cellspacing="0"> 
                 <thead>
                       <tr> 
                             <th scope="col">#</th>
                             <th scope="col">Length</th>
                             <th scope="col">Width</th>
                             <th scope="col">Type</th>
                             <th scope="col">Available</th>
                        </tr>
                   </thead>
                <tbody>               
         ';

        while ($row = $viewBelt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $length = $row['length'];
            $width = $row['width'];
            $type = $row['type'];
            $available = $row['available'];


            echo '

                <tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $length . '</td>
                            <td>' . $width . '</td>
                            <td>' . $type . '</td>
                            <td>
                                ';

                            //CHECK AVALIBLE BELT
                               if ($available == 0)
                                {

                                    echo '<span class="badge badge-pill badge-success">YES</span>';

                                }

                                if ($available == 1)
                                {
                                    echo '<span class="badge badge-pill badge-danger">NO</span>';
                                }


                     echo '</td>
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

        $viewBelt = $this->pdo->prepare('select * from belt where available = 0 ');
        $viewBelt->execute();


        echo ' 
 
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
            // $available = $row['available'];


            echo '

                <tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $length . '</td>
                            <td>' . $width . '</td>
                            <td>' . $type . '</td>
                            
                            <td>
                                    <form method="POST" action="deletebelt.php">
                                    <input type="hidden" value="' . $row['id'] . '" name="id"/>
                                    <input type="submit" class="btn btn-info" value="Delete"/>
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

    public function deletebeltdata()
    {


        $deletebeltid = $_POST['id'];
        // CHECK DELETE BELT
        // echo '</br> post=';
        // echo $deletebeltid;

        $editorBelt = $this->pdo->prepare("DELETE FROM belt WHERE id=:id");
        $editorBelt->bindValue(':id', $deletebeltid, PDO::PARAM_INT);
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
                             <p class="text-center">The belt has been successfully deleted!</p>
                             <p><a class="btn btn-success btn-lg btn-block" href="../index.php" role="button">OK &raquo;</a></p>
                     </div>
                </div>
                    
                <div class="col-md-3">
                    
                </div>
            
            </div>


     

            ';

        // END - successful add

    }

    public function editbelt()
    {

        $viewBelt = $this->pdo->prepare('select * from belt where available = 0');
      //  $viewBelt = $this->pdo->prepare('select * from belt');
        $viewBelt->execute();


        echo ' 
        <h3><p class="text-center">Edit Belt</p></h3></br> 
            <table id="table-full" class="table table-striped table-bordered" width="100%" cellspacing="0">
                 <thead>
                       <tr> 
                             <th scope="col">#</th>
                             <th scope="col">Length</th>
                             <th scope="col">Width</th>
                             <th scope="col">Type</th>
                             <th scope="col">Available</th>
                             <th scope="col">Edit</th>
                        </tr>
                   </thead>
                <tbody>
                   
  
         ';


        while ($row = $viewBelt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $length = $row['length'];
            $width = $row['width'];
            $type = $row['type'];
            $available = $row['available'];


            echo '

                <tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $length . '</td>
                            <td>' . $width . '</td>
                            <td>' . $type . '</td>
                            <td>
                                ';

                            //CHECK AVALIBLE BELT
                               if ($available == 0)
                                {

                                    echo '<span class="badge badge-pill badge-success">YES</span>';

                                }

                                if ($available == 1)
                                {
                                    echo '<span class="badge badge-pill badge-danger">NO</span>';
                                }


                     echo ' </td>
                            <td>
                                    <form method="POST" action="editbelt.php">
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
                                <input type="submit" class="btn btn-info" value="Change"/> 
                            </td>
             </form>  
                    
            <form method="POST" action="deletebelt.php">
                            <td>  
                                    <input type="hidden" value="' . $row['id'] . '" name="id"/>
                                    <input type="submit" class="btn btn-info" value="Delete "/>      
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

            // CHECK POST IS SET
            // echo "Yes, POST is set </br>";
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

                // START - successful edit change

                echo '

            </br>

            <div class="row">
            
                <div class="col-md-3">
                </div>
                
                <div class="col-md-6">
                    <div class="alert alert-success text-center" role="alert">
                        <h4 class="alert-heading">Edited!</h4>
                             <p class="text-center">The belt  has been successfully editeded!</p>
                             <p><a class="btn btn-success btn-lg btn-block" href="../index.php" role="button">OK &raquo;</a></p>
                     </div>
                </div>
                    
                <div class="col-md-3">
                    
                </div>
            
            </div>


            ';

                // END - successful edit change


              // CHECK EDIT CHANGE
              //  echo 'change OK';
              //  echo $beltid;
            }

        }

        else
        {
            echo "N0, mail is not set";
        }



    }

    public function addbelt()
    {
        echo'
<h3><p class="text-center">Add Belt</p></h3></br>

<form  method="POST" action="addbelt.php" class="container" id="needs-validation" novalidate>
  
  <div class="row">
      
    <div class="col-md-3 mb-3">
      <label for="validationCustom04">Length</label>
      <input name="addlength" type="text" class="form-control" id="validationCustom04" placeholder="Length in millimeters" required>
          <div class="invalid-feedback">
            Please provide a valid length.
          </div>
    </div>
    
        <div class="col-md-3 mb-3">
          <label for="validationCustom05">Width</label>
          <input name="addwidth" type="text" class="form-control" id="validationCustom05" placeholder="Width in millimeters" required>
              <div class="invalid-feedback">
                Please provide a valid width.
              </div>
         </div>
         
           <div class="col-md-6 mb-3">
          <label for="validationCustom03">Type</label>
          <input name="addtype" type="text" class="form-control" id="validationCustom03" placeholder="Type" required>
              <div class="invalid-feedback">
                Please provide a valid type.
              </div>
        </div>
  </div>
  <button class="btn btn-primary" type="submit">Add Belt</button>
</form>

<script>

(function() {
  \'use strict\';

  window.addEventListener(\'load\', function() {
    var form = document.getElementById(\'needs-validation\');
    form.addEventListener(\'submit\', function(event) {
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add(\'was-validated\');
    }, false);
  }, false);
})();
</script>
 
        
        ';

    }

    public function addbeltdata()
    {

       // CHECK ADD BELT
       // echo $_POST["addtype"];
       // echo $_POST["addlength"];
       // echo $_POST["addwidth"];

        $addbelttype = $_POST["addtype"];
        $addbeltlength = $_POST["addlength"];
        $addbeltwidth = $_POST["addwidth"];


        $editorBelt = $this->pdo->prepare("INSERT INTO belt (length, width, type) VALUES (:length,:width,:type)");
        $editorBelt->bindValue(':length', $addbeltlength, PDO::PARAM_INT);
        $editorBelt->bindValue(':width', $addbeltwidth, PDO::PARAM_INT);
        $editorBelt->bindValue(':type', $addbelttype, PDO::PARAM_STR);
        $editorBelt->execute();

        // START - successful add

        echo '
        </br>
        
        <div class="row">
        
            <div class="col-md-3">
            </div>
            
            <div class="col-md-6">
                <div class="alert alert-success text-center" role="alert">
                    <h4 class="alert-heading">Well done!</h4>
                         <p class="text-center">The belt has been successfully added!</p>
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

?>


