<?php


class user extends database
{
    public function viewuser()
    {


        $viewBelt = $this->pdo->prepare('select * from user');
        $viewBelt->execute();


        echo ' 
 
            <table class="table">
                 <thead>
                       <tr> 
                             <th scope="col">#</th>
                             <th scope="col">Login</th>
                             <th scope="col">Pass</th>
                             <th scope="col">Access</th>
                        </tr>
                   </thead>
                <tbody>
                   
  
         ';


        while ($row = $viewBelt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $login = $row['login'];
            $pass = $row['pass'];
            $access = $row['access'];


            echo '

                <tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $login . '</td>
                            <td>' . $pass . '</td>
                            <td>' . $access . '</td>

                </tr>
                            ';

        }

        echo '
        
                  </tbody>
               </table>
        
         ';


    }

    public function deleteuser()
    {


        $viewBelt = $this->pdo->prepare('select * from user');
        $viewBelt->execute();


        echo ' 
 
            <table class="table">
                 <thead>
                       <tr> 
                             <th scope="col">#</th>
                             <th scope="col">Login</th>
                             <th scope="col">Pass</th>
                             <th scope="col">Access</th>
                             <th scope="col">Delete</th>
                        </tr>
                   </thead>
                <tbody>
                   
  
         ';


        while ($row = $viewBelt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $login = $row['login'];
            $pass = $row['pass'];
            $access = $row['access'];


            echo '

                <tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $login . '</td>
                            <td>' . $pass . '</td>
                            <td>' . $access . '</td>
                            <td>
                                    <form method="POST" action="user/deleteuser.php">
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

    public function deleteuserdata()
    {

        echo '</br> post=';
        $deleteuserid = $_POST['id'];
        echo $deleteuserid  ;

        $editorBelt = $this->pdo->prepare("DELETE FROM user WHERE id=:id");
        $editorBelt->bindValue(':id', $deleteuserid, PDO::PARAM_INT);
        $editorBelt->execute();

    }

    public function edituser()
    {


        $viewBelt = $this->pdo->prepare('select * from user');
        $viewBelt->execute();


        echo ' 
 
            <table class="table">
                 <thead>
                       <tr> 
                             <th scope="col">#</th>
                             <th scope="col">Login</th>
                             <th scope="col">Pass</th>
                             <th scope="col">Access</th>
                             <th scope="col">Edit</th>
                        </tr>
                   </thead>
                <tbody>
                   
  
         ';


        while ($row = $viewBelt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $login = $row['login'];
            $pass = $row['pass'];
            $access = $row['access'];


            echo '

                <tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $login . '</td>
                            <td>' . $pass . '</td>
                            <td>' . $access . '</td>
                            <td>
                                    <form method="POST" action="user/edituser.php">
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

    public function editoruser()
    {


        $viewBelt = $this->pdo->prepare("select * from user where ID = :value");
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
            $login = $row['login'];
            $pass = $row['pass'];
            $access = $row['access'];


            echo '


                
                
            <form method="POST" action="edituserchange.php">
            
                <tr>
                            <th scope="row"> 
                            ' . $id . '
                            <input type="hidden" value="' . $row['id'] . '" name="id"/>
                            </th>
                            
                            <td>
                                <input  name="login" class="form-control" type="text"  value="'. $login .'" placeholder=" ' . $login . ' ">
                             
                            </td>
                            
                            <td>
                                <input name="pass" class="form-control" type="text" value="' . $pass . '" placeholder=" ' . $pass . '">
                            </td>
                            
                            <td>
                                <input name="access" class="form-control" type="text" value="' . $access . '" placeholder=" ' . $access . '">
                            </td>
                            
                            <td>
                                <input type="submit" class="btn btn-info" value="Change ID=' . $row['id'] . '"/> 
                            </td>
             </form>  
                    
            <form method="POST" action="deleteuser.php">
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

    public function checkeditoruser()
    {



        if (!empty($_POST["login"]) || ($_POST["pass"]) || ($_POST["access"]) )
        {

            echo "Yes, POST is set </br>";
            $userid = $_POST["id"];
            $userlogin = $_POST["login"];
            $userpass = $_POST["pass"];
            $useraccess = $_POST["access"];

            /* Check varible editor */

            if ( (empty($userlogin)) || (empty($userpass)) || (empty($useraccess)) )
            {

                if (empty($userlogin)) {
                    echo '
                            <form method="POST" action="edituser.php">
                            <input type="hidden" value="' . $beltid . '" name="id"/>
                            <input type="submit" class="btn btn-info" value="BackEdit ID=' . $beltid. '"/>
                            </form>
                        
                        ';  }

                if (empty($userpass)) {
                    echo '
                            <form method="POST" action="edituser.php">
                            <input type="hidden" value="' . $beltid . '" name="id"/>
                            <input type="submit" class="btn btn-info" value="BackEdit ID=' . $beltid . '"/>
                            </form>
                            
                        '; }

                if (empty($useraccess)) {
                    echo '
                            <form method="POST" action="edituser.php">
                            <input type="hidden" value="' . $beltid . '" name="id"/>
                            <input type="submit" class="btn btn-info" value="BackEdit ID=' . $beltid . '"/>
                            </form>
                        
                        '; }

            }

            else
            {
                $editorUser = $this->pdo->prepare("UPDATE user SET id = :id, login = :login, pass = :pass, access = :access WHERE user.id = :id");
                $editorUser->bindValue(':id', $userid, PDO::PARAM_INT);
                $editorUser->bindValue(':login', $userlogin, PDO::PARAM_INT);
                $editorUser->bindValue(':pass', $userpass, PDO::PARAM_INT);
                $editorUser->bindValue(':access', $useraccess, PDO::PARAM_STR);
                $editorUser->execute();
                echo 'change OK';
                echo $userid;
            }

        }

        else
        {
            echo "N0, mail is not set";
        }



    }

    public function adduser()
    {
        echo'


<form  method="POST" action="user/adduser.php" class="container" id="needs-validation" novalidate>
  
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Name</label>
      <input name="addlogin" type="text" class="form-control" id="validationCustom03" placeholder="Login" required>
      <div class="invalid-feedback">
        Please provide a valid Name.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom04">Adres</label>
      <input name="addpass" type="text" class="form-control" id="validationCustom04" placeholder="Pass" required>
      <div class="invalid-feedback">
        Please provide a valid adres.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom05">Note</label>
      <input name="addaccess" type="text" class="form-control" id="validationCustom05" placeholder="Access" required>
      <div class="invalid-feedback">
        Please provide a valid width.
      </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Dodaj</button>
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

    public function adduserdata()
    {

        echo $_POST["addlogin"];
        echo $_POST["addpass"];
        echo $_POST["addaccess"];


        $adduserlogin = $_POST["addlogin"];
        $addusertadres = $_POST["addpass"];
        $adduseraccess = $_POST["addaccess"];



        $editorUser = $this->pdo->prepare("INSERT INTO user (login, pass, access) VALUES (:login, :pass, :access)");
        $editorUser->bindValue(':login', $adduserlogin, PDO::PARAM_STR);
        $editorUser->bindValue(':pass', $addusertadres, PDO::PARAM_STR);
        $editorUser->bindValue(':access', $adduseraccess, PDO::PARAM_INT);
        $editorUser->execute();



    }

}
