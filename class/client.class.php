<?php


class client extends database
{
    public function viewclient()
    {


        $viewBelt = $this->pdo->prepare('select * from client');
        $viewBelt->execute();


        echo ' 
 
         <h3><p class="text-center">View Client</p></h3></br>
 
            <table id="table-full" class="table table-striped table-bordered" width="100%" cellspacing="0">
                 <thead>
                       <tr> 
                             <th scope="col">#</th>
                             <th scope="col">Name</th>
                             <th scope="col">Adres</th>
                             <th scope="col">Note</th>
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

                </tr>
                            ';

        }

        echo '
        
                  </tbody>
               </table>
        
         ';


    }

    public function deleteclient()
    {
        $viewBelt = $this->pdo->prepare('select * from client');
        $viewBelt->execute();

        echo ' 
 
        <h3><p class="text-center">Delete Belt</p></h3></br>
 
            <table id="table-full" class="table table-striped table-bordered" width="100%" cellspacing="0">
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
                                    <form method="POST" action="deleteclient.php">
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

    public function deleteclientdata()
    {

        $deleteclientid = $_POST['id'];

        // CHECK DELETE POST
        // echo '</br> post=';
        // echo $deleteclientid ;

        $editorBelt = $this->pdo->prepare("DELETE FROM client WHERE id=:id");
        $editorBelt->bindValue(':id', $deleteclientid, PDO::PARAM_INT);
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
                             <p class="text-center">The client has been successfully deleted!</p>
                             <p><a class="btn btn-success btn-lg btn-block" href="../index.php" role="button">OK &raquo;</a></p>
                     </div>
                </div>
                    
                <div class="col-md-3">
                    
                </div>
            
            </div>

            ';

        // END - successful add

    }

    public function editclient()
    {


        $viewBelt = $this->pdo->prepare('select * from client');
        $viewBelt->execute();


        echo ' 
 
         <h3><p class="text-center">Edit Belt</p></h3></br>
 
            <table id="table-full" class="table table-striped table-bordered" width="100%" cellspacing="0">
                 <thead>
                       <tr> 
                             <th scope="col">#</th>
                             <th scope="col">Name</th>
                             <th scope="col">Adress</th>
                             <th scope="col">Note</th>
                             <th scope="col">Edit</th>
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
                                    <form method="POST" action="editclient.php">
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

    public function editorclient()
    {

        $viewBelt = $this->pdo->prepare("select * from client where ID = :value");
        $viewBelt->execute(array(':value' => $_POST['id']));

        echo ' 
 
            <table class="table">
                 <thead>
                       <tr> 
                             <th scope="col">#</th>
                             <th scope="col">Nameh</th>
                             <th scope="col">Adres</th>
                             <th scope="col">Note</th>
                             <th scope="col">Change</th>
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
              
            <form method="POST" action="editclientchange.php">
            
                <tr>
                            <th scope="row"> 
                            ' . $id . '
                            <input type="hidden" value="' . $row['id'] . '" name="id"/>
                            </th>
                            
                            <td>
                                <input  name="name" class="form-control" type="text"  value="'. $name .'" placeholder=" ' . $name . ' ">
                             
                            </td>
                            
                            <td>
                                <input name="adres" class="form-control" type="text" value="' . $adres . '" placeholder=" ' . $adres . '">
                            </td>
                            
                            <td>
                                <input name="note" class="form-control" type="text" value="' . $note . '" placeholder=" ' . $note . '">
                            </td>
                            
                            <td>
                                <input type="submit" class="btn btn-info" value="Change"/> 
                            </td>
             </form>  
                    
            <form method="POST" action="deleteclient.php">
                            <td>  
                                    <input type="submit" class="btn btn-info" value="Delete"/>
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

    public function checkeditorclient()
    {

        if (!empty($_POST["name"]) || ($_POST["adres"]) || ($_POST["note"]) )
        {

            // CHECK EDIT CLIENT POST
            //echo "Yes, POST is set </br>";

            $clientid = $_POST["id"];
            $clientname = $_POST["name"];
            $clientadres = $_POST["adres"];
            $clientnote = $_POST["note"];

            /* Check varible editor */

            if ( (empty($clientname)) || (empty($clientadres)) || (empty($clientnote)) )
            {

                if (empty($clientname)) {
                    echo '
                            <form method="POST" action="editbelt.php">
                            <input type="hidden" value="' . $beltid . '" name="id"/>
                            <input type="submit" class="btn btn-info" value="BackEdit ID=' . $beltid. '"/>
                            </form>
                        
                        ';  }

                if (empty($clientadres)) {
                    echo '
                            <form method="POST" action="editbelt.php">
                            <input type="hidden" value="' . $beltid . '" name="id"/>
                            <input type="submit" class="btn btn-info" value="BackEdit ID=' . $beltid . '"/>
                            </form>
                            
                        '; }

                if (empty($clientnote)) {
                    echo '
                            <form method="POST" action="editbelt.php">
                            <input type="hidden" value="' . $beltid . '" name="id"/>
                            <input type="submit" class="btn btn-info" value="BackEdit ID=' . $beltid . '"/>
                            </form>
                        
                        '; }

            }

            else
            {
                $editorBelt = $this->pdo->prepare("UPDATE client SET id = :id, name = :name, adres = :adres, note = :note WHERE client.id = :id");
                $editorBelt->bindValue(':id', $clientid, PDO::PARAM_INT);
                $editorBelt->bindValue(':name', $clientname, PDO::PARAM_INT);
                $editorBelt->bindValue(':adres', $clientadres, PDO::PARAM_INT);
                $editorBelt->bindValue(':note', $clientnote, PDO::PARAM_STR);
                $editorBelt->execute();

                // START - successful edit

                echo '

            </br>

            <div class="row">
            
                <div class="col-md-3">
                </div>
                
                <div class="col-md-6">
                    <div class="alert alert-success text-center" role="alert">
                        <h4 class="alert-heading">Edited!</h4>
                             <p class="text-center">The client has been successfully editeded!</p>
                             <p><a class="btn btn-success btn-lg btn-block" href="../index.php" role="button">OK &raquo;</a></p>
                     </div>
                </div>
                    
                <div class="col-md-3">
                    
                </div>
            
            </div>


            ';

                // END - successful edit


                // CHECK EDIT CLIENT CHANGE
                //echo 'change OK';
                //echo $clientid;
            }
        }

        else
        {
            echo "N0, mail is not set";
        }

    }

    public function addclient()
    {
        echo'

<h3><p class="text-center">Add Client</p></h3></br>


<form  method="POST" action="addclient.php" class="container" id="needs-validation" novalidate>
  
  <div class="row">
        <div class="col-md-6 mb-3">
          <label for="validationCustom03">Name</label>
          <input name="addname" type="text" class="form-control" id="validationCustom03" placeholder="Name" required>
              <div class="invalid-feedback">
                Please provide a valid Name.
              </div>
        </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom04">Adres</label>
      <input name="addadres" type="text" class="form-control" id="validationCustom04" placeholder="Adres" required>
          <div class="invalid-feedback">
            Please provide a valid adres.
          </div>
    </div>
        <div class="col-md-3 mb-3">
          <label for="validationCustom05">Note</label>
          <input name="addnote" type="text" class="form-control" id="validationCustom05" placeholder="Note" required>
              <div class="invalid-feedback">
                Please provide a valid width.
              </div>
        </div>
  </div>
  <button class="btn btn-primary" type="submit">Add Client</button>
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

    public function addclientdata()
    {

        // CHECK ADD CLIENT
        // echo $_POST["addname"];
        // echo $_POST["addadres"];
        // echo $_POST["addnote"];

        $addcientname = $_POST["addname"];
        $addclientadres = $_POST["addadres"];
        $addclienttype = $_POST["addnote"];

        $editorClient = $this->pdo->prepare("INSERT INTO client (name, adres, note) VALUES (:name,:adres,:note)");
        $editorClient->bindValue(':name', $addcientname, PDO::PARAM_STR);
        $editorClient->bindValue(':adres', $addclientadres, PDO::PARAM_STR);
        $editorClient->bindValue(':note', $addclienttype, PDO::PARAM_STR);
        $editorClient->execute();

        // START - successful add

        echo '

            </br>

            <div class="row">
            
                <div class="col-md-3">
                </div>
                
                <div class="col-md-6">
                    <div class="alert alert-success text-center" role="alert">
                        <h4 class="alert-heading">Well Done!</h4>
                             <p class="text-center">The client has been successfully added!</p>
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