<?php
require_once 'config/loader.php';
spl_autoload_register('loader::loaderRoot');

ob_start();
session_start();

$site = new viewsite();
$site->starthead();
$site->menu();



?>

// form

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
                            <input class="form-control" placeholder="Login" name="email" type="login" value"">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        </div>
                        <a href="#" class="btn btn-sm btn-success">Login</a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
$site->endhead();
ob_end_flush();
?>





