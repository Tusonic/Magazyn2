<?php
require_once '../config/loader.php';
spl_autoload_register('loader::loaderDir');

ob_start();
session_start();

echo '</br> post=';
$post1 = $_POST['id'];
echo $post1;

ob_end_flush();
?>



