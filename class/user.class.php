<?php


class user extends database
{
    public function viewuser()
    {


        $viewBelt = $this->pdo->prepare('select * from user');
        $viewBelt->execute();


        echo ' 
 
        <h3><p class="text-center">View User</p></h3></br>
 
            <table id="table-full" class="table table-striped table-bordered" width="100%" cellspacing="0">
                 <thead>
                       <tr> 
                             <th scope="col">#</th>
                             <th scope="col">Login</th>
                             <th scope="col">Access</th>
                        </tr>
                   </thead>
                <tbody>
                   
  
         ';


        while ($row = $viewBelt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $login = $row['login'];
            $access = $row['access'];


            echo '

                <tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $login . '</td>
                            <td>';
                            if ($access == 1)
                            {
                                echo 'USER';
                            }
                            elseif ($access = 2)
                            {
                                echo 'MODERATOR';
                            }
                            elseif ($access =3)
                            {
                                echo 'ADMIN';
                            }
                            else
                            {
                                echo 'ERROR';
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

    public function deleteuser()
    {


        $viewBelt = $this->pdo->prepare('select * from user');
        $viewBelt->execute();


        echo ' 

        <h3><p class="text-center">Delete User</p></h3></br>
 
            <table id="table-full" class="table table-striped table-bordered" width="100%" cellspacing="0">
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
                                    <form method="POST" action="deleteuser.php">
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

    public function deleteuserdata()
    {

        $deleteuserid = $_POST['id'];

        // CHECK DELETE POST
        //echo '</br> post=';
        //echo $deleteuserid  ;

        $editorBelt = $this->pdo->prepare("DELETE FROM user WHERE id=:id");
        $editorBelt->bindValue(':id', $deleteuserid, PDO::PARAM_INT);
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
                             <p class="text-center">The user has been successfully deleted!</p>
                             <p><a class="btn btn-success btn-lg btn-block" href="../index.php" role="button">OK &raquo;</a></p>
                     </div>
                </div>
                    
                <div class="col-md-3">
                    
                </div>
            
            </div>

            ';

        // END - successful add

    }

    public function edituser()
    {


        $viewBelt = $this->pdo->prepare('select * from user');
        $viewBelt->execute();


        echo ' 
 
 <h3><p class="text-center">Edit User</p></h3></br>
 
            <table id="table-full" class="table table-striped table-bordered" width="100%" cellspacing="0">
                 <thead>
                       <tr> 
                             <th scope="col">#</th>
                             <th scope="col">Login</th>
                             <th scope="col">Pass</th>
                             <th scope="col">Access</th>
                             <th scope="col">Blocked</th>
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
            $blocked = $row['blocked'];


            echo '

                <tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $login . '</td>
                            <td>' . $pass . '</td>
                            <td>';
                            if ($access == 1)
                            {
                                echo 'USER';
                            }
                            elseif ($access == 2)
                            {
                                echo 'MODERATOR';
                            }
                            elseif ($access == 3)
                            {
                                echo 'ADMINSTRATOR';
                            }
                            else
                            {
                                echo 'ERROR';
                            }

                       echo'</td>
                            <td>';

                            if ($blocked == 0)
                            {
                                echo '<span class="badge badge-pill badge-success">NO</span>';
                            }
                            else
                            {
                                echo '<span class="badge badge-pill badge-danger">YES</span>';
                            }

                             echo
                             '</td>
                            <td>
                                    <form method="POST" action="edituser.php">
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

    public function editoruser()
    {


        $viewBelt = $this->pdo->prepare("select * from user where ID = :value");
        $viewBelt->execute(array(':value' => $_POST['id']));


        echo ' 
  
            <table class="table">
                 <thead>
                       <tr> 
                             <th scope="col">#</th>
                             <th scope="col">Login</th>
                             <th scope="col">Password</th>
                             <th scope="col">Access</th>
                             <th scope="col">Blocked</th>
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
            $blocked = $row['blocked'];


            echo '
               
            <form method="POST" action="edituserchange.php">
            
                <tr>
                            <th scope="row"> 
                            ' . $id . '
                            <input type="hidden" value="' . $row['id'] . '" name="id"/>
                            </th>
                            
                            <td>
                                <input  name="login" class="form-control" type="text"  value="' .$login. '" placeholder=" ' . $login . ' ">
                             
                            </td>
                            
                            <td>
                                <input name="pass" class="form-control" type="text" value="'. $pass .'" placeholder=" ' . $pass . '">
                            </td>
                            
                            <td>
                             ';

                                if ($access == 3)
                                {
                                    echo '
                                 <select class="custom-select mr-sm-2" name="access">
                                    <option value="1">USER</option>
                                    <option value="2">MODERATOR</option>
                                    <option selected value="3">ADMIN</option>                                 
                                 </select> ';
                                }
                                elseif ($access == 2)
                                {
                                    echo '
                                 <select class="custom-select mr-sm-2" name="access">
                                    <option value="1">USER</option>
                                    <option selected value="2">MODERATOR</option>
                                    <option value="3">ADMIN</option>                                 
                                 </select> ';
                                }
                                elseif ($access == 1)
                                {
                                    echo '
                                 <select class="custom-select mr-sm-2" name="access">
                                    <option selected value="1">USER</option>
                                    <option value="2">MODERATOR</option>
                                    <option value="3">ADMIN</option>                                 
                                 </select> ';
                                }
                                else
                                {
                                    echo '
                                 <select class="custom-select mr-sm-2" name="access">
                                    <option selected value="1">USER</option>
                                    <option value="2">MODERATOR</option>
                                    <option value="3">ADMIN</option>                                 
                                 </select> ';
                                }


                              echo '
                          </td>
                            
                            <td> ';

                                if ($blocked == 0)
                                {
                                echo '
                                 <select class="custom-select mr-sm-2" name="blocked">
                                    <option selected value="0">NO</option>
                                    <option value="1">YES</option>
                                 </select> ';
                                }
                                elseif ($blocked == 1)
                                {
                                echo '
                                 <select class="custom-select mr-sm-2" name="blocked">
                                    <option value="0">NO</option>
                                    <option selected value="1">YES</option>
                                 </select> ';
                                }
                                else
                                {
                                    echo 'ERROR';
                                }

                           echo '</td>
                            
                            <td>             
                                <form method="POST" action="edituser.php">
                                    <input type="submit" class="btn btn-info" value="Change"/>
                                    <input type="hidden" value="' . $id  . '" name="id"/>
                                 </form>
                            </td>
             </form>  
                    
                                <form method="POST" action="deleteuser.php">
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

    public function checkeditoruser()
    {

        if (isset($_POST["blocked"]))
        {
            echo 'tak';
            echo $_POST["blocked"];
        }
        else
        {
            echo 'nie';
            echo $_POST["blocked"];
        }

        if ((!empty($_POST["login"])) || (!empty($_POST["pass"])) || (!empty($_POST["access"]))   )
        {

            // CHECK SET EDIT POST USER
            // echo "Yes, POST is set </br>";
            $userid = $_POST["id"];
            $userlogin = $_POST["login"];
            $userpass = $_POST["pass"];
            $useraccess = $_POST["access"];
            $userblocked = $_POST["blocked"];

            // CHECK VARIBLE
            echo $userid;
            echo $userlogin;
            echo $userpass;
            echo $useraccess;
            echo $userblocked;

            /* Check varible editor */

            // DOPISAC " PODAJ LOGIN... PODAJ ACCESS ITP !!!

            if ( (empty($userlogin)) || (empty($userpass)) || (empty($useraccess)) || (!isset($userblocked)) )
            {
                echo '<form method="POST" action="edituser.php">
                        
                          <div class="col-md-6 offset-md-3"">
                          
                              <div class="alert alert-danger text-center" role="alert">
                              Error, data incomplete!  </br></br>
                              <input type="hidden" value="' . $userid . '" name="id"/>
                              <input type="submit" class="btn btn-danger" value="Back to user ID:' . $userid . '"/>
                              </div>

                         </div> 
               
                          
                ';

                if (empty($userlogin)) {
                    echo '
                             <div class="col-md-6 offset-md-3">
                    <div class="alert alert-danger text-center" role="alert">
                             <p class="text-center">Please complete LOGIN</p>
                      </div>
                </div>
                        
                        ';  }

                if (empty($userpass)) {
                    echo '

                <div class="col-md-6 offset-md-3">
                    <div class="alert alert-danger text-center" role="alert">
                             <p class="text-center">Please complete PASSWORD</p>
                      </div>
                </div>
     
                        '; }

                if (empty($useraccess)) {
                    echo '
                            <div class="col-md-6 offset-md-3">
                    <div class="alert alert-danger text-center" role="alert">
                             <p class="text-center">Please complete ACCESS</p>
                      </div>
                </div>
                        
                        '; }

                if (!isset($userblocked)) {
                    echo '
                             <div class="col-md-6 offset-md-3">
                    <div class="alert alert-danger text-center" role="alert">
                             <p class="text-center">Please complete BLOCK</p>
                      </div>
                </div>
                        
                        '; }
               echo ' </form>';
            }

            else
            {
                $editorUser = $this->pdo->prepare("UPDATE user SET id = :id, login = :login, pass = :pass, access = :access, blocked = :blocked WHERE user.id = :id");
                $editorUser->bindValue(':id', $userid, PDO::PARAM_INT);
                $editorUser->bindValue(':login', $userlogin, PDO::PARAM_INT);
                $editorUser->bindValue(':pass', $userpass, PDO::PARAM_INT);
                $editorUser->bindValue(':access', $useraccess, PDO::PARAM_STR);
                $editorUser->bindValue(':blocked', $userblocked, PDO::PARAM_INT);
                $editorUser->execute();

                // CHECK CHANGE OK
                //echo 'change OK';
                //echo $userid;

                // START - successful add

                echo '

            </br>

            <div class="row">
            
                <div class="col-md-3">
                </div>
                
                <div class="col-md-6">
                    <div class="alert alert-success text-center" role="alert">
                        <h4 class="alert-heading">Edited!</h4>
                             <p class="text-center">The user has been successfully edited!</p>
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

        else
        {
            echo "
            
           <div class='row'>
            
                <div class='col-md-3'>
                </div>
                
                <div class='col-md-6'>
                    <div class='alert alert-danger text-center' role='alert'>
                        <h4 class='alert-heading'>Edited Error</h4>
                             <p class='text-center'>The user has been un-successfully edited!</p>
                             <p><a class='btn btn-danger btn-lg btn-block' href='../index.php' role='button'>OK &raquo;</a></p>
                     </div>
                </div>
                    
                <div class='col-md-3'>
                    
                </div>
            
            </div>
            
            
            ";
        }



    }

    public function adduser()
    {
        echo'

        <h3><p class="text-center">Add User</p></h3></br>


<form  method="POST" action="adduser.php" class="container" id="needs-validation" novalidate>
  
  <div class="row">
        <div class="col-md-6 mb-3">
          <label for="validationCustom03">Name / Login</label>
          <input name="addlogin" type="text" class="form-control" id="validationCustom03" placeholder="Login" required>
              <div class="invalid-feedback">
                Please provide a valid Name.
              </div>
        </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom04">Password</label>
      <input name="addpass" type="text" class="form-control" id="validationCustom04" placeholder="Pass" required>
          <div class="invalid-feedback">
            Please provide a valid adres.
          </div>
    </div>
        <div class="col-md-3 mb-3">
        
         <label for="inputState">State</label>
             <select id="inputState" class="form-control" name="addaccess">
                  <option selected value="1">USER</option>
                  <option value="2">MODERATOR</option>
                  <option value="3">ADMIN</option>
             </select>
             
        </div>
  </div>
  <button class="btn btn-primary" type="submit">Add User</button>
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

        // CHECK VARIBLE ADD USER
        // echo $_POST["addlogin"];
        // echo $_POST["addpass"];
        // echo $_POST["addaccess"];

        $adduserlogin = $_POST["addlogin"];
        $addusertadres = $_POST["addpass"];
        $adduseraccess = $_POST["addaccess"];

        $editorUser = $this->pdo->prepare("INSERT INTO user (login, pass, access) VALUES (:login, :pass, :access)");
        $editorUser->bindValue(':login', $adduserlogin, PDO::PARAM_STR);
        $editorUser->bindValue(':pass', $addusertadres, PDO::PARAM_STR);
        $editorUser->bindValue(':access', $adduseraccess, PDO::PARAM_INT);
        $editorUser->execute();

        // START - successful add

        echo '

            </br>

            <div class="row">
            
                <div class="col-md-3">
                </div>
                
                <div class="col-md-6">
                    <div class="alert alert-success text-center" role="alert">
                        <h4 class="alert-heading">Well Done!</h4>
                             <p class="text-center">The user has been successfully added!</p>
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