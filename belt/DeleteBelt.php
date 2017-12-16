<?php
ob_start();
session_start();

echo '</br> post=';
$post1 = $_POST['id'];
echo $post1;

ob_end_flush();
?>



