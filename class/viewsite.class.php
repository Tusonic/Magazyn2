<?php

class viewsite extends database {

   public $_login = null;

    // CONFIG ACCESS

    public $_user = 1;
    public $_moderator = 2;
    public $_adminstrator = 3;
/*
    public function starthead()
        {
            echo'

                <!doctype html>
                <html lang="en">
                    <head>
                        <title>Magazyn 2</title>

                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                                                
                        <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
                        <link rel="stylesheet" type="text/css" href="/css/tablebootstrap.css">
                   
                        <script src="/js/jquery.1.12.4.js"></script>
                        <script src="/js/jquery.dataTables.js"></script> 
                        <script src="/js/datatables.bootstrap.js"></script>   
                 
                    </head>
                <body>
                <div class="container">


                ';


        }
*/

    public function starthead()
    {
        echo'

                <!doctype html>
                <html lang="en">
                    <head>
                        <title>Magazyn 2</title>

                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                                                
                         <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                        
                        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.0.0/dt-1.10.16/fc-3.2.4/fh-3.1.3/datatables.min.css"/>
                        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.0.0/dt-1.10.16/fc-3.2.4/fh-3.1.3/datatables.min.js"></script>
                 
                    </head>
                <body>
                <div class="container">


                ';


    } //test bootstrap 4.0.0

    public function login()
    {


        if (isset($_POST['login'])) {


            $_SESSION['login'] = ($_POST['login']);
            $_SESSION['password'] = ($_POST['password']);

           // CHECK WORK LOGIN & PASSWORD
           // echo $_POST['login'];
           // echo $_POST['password'];

           // echo 'CHECK SESION WORK LOGIN & PASSWORD </br>';
           // echo $_SESSION['login'].'</br>';
           // echo $_SESSION['password'].'</br>';

            $systemlogin = $this->pdo->prepare("SELECT COUNT(*) from user WHERE login = '{$_SESSION['login']}' AND pass = '{$_SESSION['password']}'");
            $systemlogin->execute();

            $num_rows = $systemlogin->fetchColumn();

           // CHECK COUNT ROW LOGIN + PASS 1=ok/0=error
           // echo $num_rows;

            $_SESSION['login_in'] = $num_rows;
            $this->_login = $num_rows;


        }

        else

        {
        // COULD START
        // echo 'EMPTY LOGIN';
        }

        if (isset($_SESSION['login_in']))
        {
                if ($_SESSION['login_in'] == 0) {
                    echo '
                         <!-- CODE LOGIN START-->
                           
<form action="index.php" method="POST">
                    </br>
                    
    <div class="row"> 
         <div class="col-md-3"> </div>                
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Magazyn 2</h3>
                    </div>
                    <div class="panel-body">
                        <form accept-charset="UTF-8" role="form">
                        <fieldset>
                        
                            <div class="form-group">
                                <input class="form-control" placeholder="Login" name="login" type="text">
                            </div>
                            
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                            
                        </fieldset>
                        </form>
                        
                          <hr/>
                   
                    </div>
                </div>
            </div>
		<div class="col-md-3"> </div> 
    </div> 
            
</form>
            
              <!-- CODE LOGIN END -->      
                        ';

                } else {

                    // ==============PANEL ACCESS =========== //

                    $systemaccess = $this->pdo->prepare("SELECT access from user WHERE login = '{$_SESSION['login']}' AND pass = '{$_SESSION['password']}'");
                    $systemaccess->execute();
                    $num_access = $systemaccess->fetchColumn();

                    // DISPLAY ACTUALITY ACCESS
                   // echo $num_access;


                    // START ACCESS USER
                    if ($num_access == $this->_user) {


                        echo '
       
       <p></p>
        <p class="text-center">Magazyn 2</p>
        <p></p>
        
        <!-- START MENU -->

   <div class="row">
    <div class="col-md-4">
        <h2><p class="text-center">TRANSACTION</p></h2>
        <p></p>
        <p><a class="btn btn-info btn-lg btn-block" href="transaction/view.php" role="button">View &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="transaction/add.php" role="button">Add &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="transaction/edit.php" role="button">Edit &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="transaction/delete.php" role="button">Delete &raquo;</a></p>
    </div>
    
    <div class="col-md-4">
        <h2><p class="text-center">INFO</p></h2></br>
        <p class="text-center">YOU ARE LOGGED IN AS:</p>
        <p class="text-center"><b>'. $_SESSION['login'] .'</b></p></br>
        <p class="text-center">YOUR ACCESS:</p>
        <p class="text-center"><b>USER</b></p>
    </div>
        
    <div class="col-md-4">
        <h2><p class="text-center">ACCOUNT</p></h2>
        <p><a class="btn btn-info btn-lg btn-block" href="logout.php" role="button">LOGOUT &raquo;</a></p>
      </div>


</div>

<div class="row">
    <div class="col-md-4">
        <h2><p class="text-center">BELT</p></h2>
        <p></p>
        <p><a class="btn btn-info btn-lg btn-block" href="belt/view.php" role="button">View &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="belt/add.php" role="button">Add &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="belt/edit.php" role="button">Edit &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="belt/delete.php" role="button">Delete &raquo;</a></p>
    </div>
    <div class="col-md-4">
        <h2><p class="text-center">CLIENT</p></h2>
        <p></p>
        <p><a class="btn btn-info btn-lg btn-block" href="client/view.php" role="button">View &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="client/add.php" role="button">Add &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="client/edit.php" role="button">Edit &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="client/delete.php" role="button">Delete &raquo;</a></p>
    </div>
    <div class="col-md-4">
        <h2><p class="text-center">USER</p></h2>
        <p></p>
        <p><a class="btn btn-info btn-lg btn-block" href="user/view.php" role="button">View &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="user/add.php" role="button">Add &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="user/edit.php" role="button">Edit &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="user/delete.php" role="button">Delete &raquo;</a></p>
    </div>

</div>

        <!-- EDN MENU -->

       ';

                    } // IF USER

      // ---------- END ACCESS USER


                    // START ACCESS MODERATOR
                    if ($num_access == $this->_moderator) {


                        echo '
       
       <p></p>
        <p class="text-center">Magazyn 2</p>
        <p></p>
        
        <!-- START MENU -->

   <div class="row">
    <div class="col-md-4">
        <h2><p class="text-center">TRANSACTION</p></h2>
        <p></p>
        <p><a class="btn btn-info btn-lg btn-block" href="transaction/view.php" role="button">View &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="transaction/add.php" role="button">Add &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="transaction/edit.php" role="button">Edit &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="transaction/delete.php" role="button">Delete &raquo;</a></p>
    </div>
    
    <div class="col-md-4">
        <h2><p class="text-center">INFO</p></h2></br>
        <p class="text-center">YOU ARE LOGGED IN AS:</p>
        <p class="text-center"><b>'. $_SESSION['login'] .'</b></p></br>
        <p class="text-center">YOUR ACCESS:</p>
        <p class="text-center"><b>MODERATOR</b></p>
    </div>
    
    <div class="col-md-4">
        <h2><p class="text-center">ACCOUNT</p></h2>
        <p><a class="btn btn-info btn-lg btn-block" href="logout.php" role="button">LOGOUT &raquo;</a></p>
     </div>


</div>

<div class="row">
    <div class="col-md-4">
        <h2><p class="text-center">BELT</p></h2>
        <p></p>
        <p><a class="btn btn-info btn-lg btn-block" href="belt/view.php" role="button">View &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="belt/add.php" role="button">Add &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="belt/edit.php" role="button">Edit &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="belt/delete.php" role="button">Delete &raquo;</a></p>
    </div>
    <div class="col-md-4">
        <h2><p class="text-center">CLIENT</p></h2>
        <p></p>
        <p><a class="btn btn-info btn-lg btn-block" href="client/view.php" role="button">View &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="client/add.php" role="button">Add &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="client/edit.php" role="button">Edit &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="client/delete.php" role="button">Delete &raquo;</a></p>
    </div>
    <div class="col-md-4">
        <h2><p class="text-center">USER</p></h2>
        <p></p>
        <p><a class="btn btn-info btn-lg btn-block" href="user/view.php" role="button">View &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="user/add.php" role="button">Add &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="user/edit.php" role="button">Edit &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="user/delete.php" role="button">Delete &raquo;</a></p>
    </div>

</div>

        <!-- EDN MENU -->

       ';

                    } // IF USER

                    // ---------- END ACCESS ADMINISTRATOR


                    // START ACCESS USER
                    if ($num_access == $this->_adminstrator) {


                        echo '
       
       <p></p>
        <p class="text-center">Magazyn 2</p>
        <p></p>
        
        <!-- START MENU -->

   <div class="row">
    <div class="col-md-4">
        <h2><p class="text-center">TRANSACTION</p></h2>
        <p></p>
        <p><a class="btn btn-info btn-lg btn-block" href="transaction/view.php" role="button">View &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="transaction/add.php" role="button">Add &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="transaction/edit.php" role="button">Edit &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="transaction/delete.php" role="button">Delete &raquo;</a></p>
    </div>
    
    <div class="col-md-4">
        <h2><p class="text-center">INFO</p></h2></br>
        <p class="text-center">YOU ARE LOGGED IN AS:</p>
        <p class="text-center"><b>'. $_SESSION['login'] .'</b></p></br>
        <p class="text-center">YOUR ACCESS:</p>
        <p class="text-center"><b>ADMINISTRATOR</b></p>
    </div>
        
    <div class="col-md-4">
        <h2><p class="text-center">ACCOUNT</p></h2>
        <p><a class="btn btn-info btn-lg btn-block" href="logout.php" role="button">LOGOUT &raquo;</a></p>
       </div>


</div>

<div class="row">
    <div class="col-md-4">
        <h2><p class="text-center">BELT</p></h2>
        <p></p>
        <p><a class="btn btn-info btn-lg btn-block" href="belt/view.php" role="button">View &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="belt/add.php" role="button">Add &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="belt/edit.php" role="button">Edit &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="belt/delete.php" role="button">Delete &raquo;</a></p>
    </div>
    <div class="col-md-4">
        <h2><p class="text-center">CLIENT</p></h2>
        <p></p>
        <p><a class="btn btn-info btn-lg btn-block" href="client/view.php" role="button">View &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="client/add.php" role="button">Add &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="client/edit.php" role="button">Edit &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="client/delete.php" role="button">Delete &raquo;</a></p>
    </div>
    <div class="col-md-4">
        <h2><p class="text-center">USER</p></h2>
        <p></p>
        <p><a class="btn btn-info btn-lg btn-block" href="user/view.php" role="button">View &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="user/add.php" role="button">Add &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="user/edit.php" role="button">Edit &raquo;</a></p>
        <p><a class="btn btn-info btn-lg btn-block" href="user/delete.php" role="button">Delete &raquo;</a></p>
    </div>

</div>

        <!-- EDN MENU -->

       ';

                    } // IF USER

                    // ---------- END ACCESS USER

            } // ELSE

        }

        else

        {
            echo '
                           <!-- CODE LOGIN START-->
                           
<form action="index.php" method="POST">
                    </br>
                    
    <div class="row"> 
         <div class="col-md-3"> </div>                
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Magazyn 2</h3>
                    </div>
                    <div class="panel-body">
                        <form accept-charset="UTF-8" role="form">
                        <fieldset>
                        
                            <div class="form-group">
                                <input class="form-control" placeholder="Login" name="login" type="text">
                            </div>
                            
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                            
                        </fieldset>
                        </form>
                        
                          <hr/>
                   
                    </div>
                </div>
            </div>
		<div class="col-md-3"> </div> 
    </div> 
            
</form>
            
              <!-- CODE LOGIN END -->      
                        ';
        }

    } //end function

    public function endhead()
        {

            echo'

              </div> <!-- /container -->  
              
               <footer class="container">
               <hr/>
                     <p align="right">&copy; Magazyn 2 Tusonic 2018</p>
               </footer>
               
        <!-- JAVA SCRIPT START  -->
              
               <script>
                 $(document).ready(function() {
            $(\'#table-full\').DataTable( {
                "pagingType": "full_numbers"
                       } );
                          } );
                </script>

        <!-- JAVA SCRIPT END  -->
 
                   
                     
                </body>
                </html>
                
            ';

        }

    public function setlogin($loginid)
    {
        if($this->_login === null)
        {
            $this->_login = $loginid;
        }

    }

    public function getlogin()
    {
        echo '</br> getloginid function = '.$this->_login;
    }

    public function backmenu()
    {

        echo '</br>
        
        <div class="row">
        
    <div class="col-md-4">
        <p class="text-center"> LOGIN: <b> '. $_SESSION['login'] .'</b></p>
       
    </div>
    
    <div class="col-md-4">
        <p class="text-center">MAGAZYN 2</p>
      
    </div>

    <div class="col-md-4">
        <p class="text-center"></p>
        <p><a class="btn btn-info btn-lg btn-block" href="../index.php" role="button">Back &raquo;</a></p>
    </div>

        </div> 
               </br>
        ';


    }


}

?>