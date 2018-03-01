<?php
session_start();
unset($_SESSION["login_in"]);
header('Location: http://magazyn.tusonic.pl');
exit;
?>