<?php

class viewsite extends database {


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

    public function menu()
    {
       echo '
       
       <p></p>
        <p class="text-center">Magazyn 2</p>
        <p></p>

   <div class="row">
    <div class="col-md-4">
        <h2><p class="text-center">TRANSACTION</p></h2>
        <p></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="transaction/view.php" role="button">View &raquo;</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="transaction/add.php" role="button">Add &raquo;</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="transaction/edit.php" role="button">Edit &raquo;</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="transaction/delete.php" role="button">Delete &raquo;</a></p>
    </div>
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
        <h2><p class="text-center">ACCOUNT</p></h2>
        <p><a class="btn btn-primary btn-lg btn-block" href="#" role="button">LOGOUT &raquo;</a></p>
        <p>INFO</p>
        <p>INFO</p>
        <p>INFO</p>
    </div>


</div>

<div class="row">
    <div class="col-md-4">
        <h2><p class="text-center">BELT</p></h2>
        <p></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="belt/view.php" role="button">View &raquo;</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="belt/add.php" role="button">Add &raquo;</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="belt/edit.php" role="button">Edit &raquo;</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="belt/delete.php" role="button">Delete &raquo;</a></p>
    </div>
    <div class="col-md-4">
        <h2><p class="text-center">CLIENT</p></h2>
        <p></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="client/view.php" role="button">View &raquo;</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="client/add.php" role="button">Add &raquo;</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="client/edit.php" role="button">Edit &raquo;</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="client/delete.php" role="button">Delete &raquo;</a></p>
    </div>
    <div class="col-md-4">
        <h2><p class="text-center">USER</p></h2>
        <p></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="user/view.php" role="button">View &raquo;</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="user/add.php" role="button">Add &raquo;</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="user/edit.php" role="button">Edit &raquo;</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="user/delete.php" role="button">Delete &raquo;</a></p>
    </div>

</div>
       
       
       ';
    }

    public function login() {

        echo $_POST['login'];
        echo $_POST['password'];

        $login = ($_POST['login']);
        $password = ($_POST['password']);

        $systemlogin = $this->pdo->prepare("SELECT COUNT(*) from user WHERE login = '$login'");
        $systemlogin->execute();

        $num_rows = $systemlogin->fetchColumn();
        echo $num_rows;

        $_SESSION['123'] = $num_rows;
        echo $_SESSION['123'];

        if ($_SESSION['123'] == '0') {

            echo '
    <form action="index.php" method="POST">
        <div class="col-md-12">
            <div class="modal-dialog" style="margin-bottom:0">
                <div class="modal-content">
                    <div class="panel-heading">
                        <h3 class="panel-title">LOGIN</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Login" name="login" type="login">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                </div>
                                <button class="btn btn-primary" type="submit">ENTER</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
    ';

        }
        else

        {
    echo 'sesion 0';

        }

    }

    public function endhead()
        {

            echo'

              </div> <!-- /container -->  
              
               <footer class="container">
                     <p>&copy; Magazyn 2 Tusonic 2018</p>
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


}

?>