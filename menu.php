
<?php
require_once 'config/loader.php';
spl_autoload_register('loader::loaderRoot');

ob_start();
session_start();

$site = new viewsite();
$site->starthead();

?>
<p></p>
<p class="text-center">Magazyn 2</p>
<p></p>

<div class="row">
    <div class="col-md-4">
        <h2><p class="text-center">BELT</p></h2>
        <p></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="belt/view.php" role="button">View &raquo;</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="belt/edit.php" role="button">Add &raquo;</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="belt/edit.php" role="button">Edit &raquo;</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="#" role="button">Delete &raquo;</a></p>
    </div>
    <div class="col-md-4">
        <h2><p class="text-center">CLIENT</p></h2>
        <p></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="#" role="button">View &raquo;</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="belt/edit.php" role="button">Add &raquo;</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="#" role="button">Edit &raquo;</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="#" role="button">Delete &raquo;</a></p>
    </div>
    <div class="col-md-4">
        <h2><p class="text-center">USER</p></h2>
        <p></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="#" role="button">View &raquo;</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="belt/edit.php" role="button">Add &raquo;</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="#" role="button">Edit &raquo;</a></p>
        <p><a class="btn btn-primary btn-lg btn-block" href="#" role="button">Delete &raquo;</a></p>
    </div>

</div>



<?php
$site->endhead();


ob_end_flush();

?>





