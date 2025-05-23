<?php
session_start();
if(!isset($_SESSION['user']) && !isset($_SESSION['pass']))
header('Location:admin-login.php');
else
header('Location:admin-home.php');
?>

