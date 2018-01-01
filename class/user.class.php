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

   // checkeditoruser()

}
