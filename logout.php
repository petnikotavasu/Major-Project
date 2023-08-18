<?php
session_start();
$_SESSION['id']='';
$_SESSION['login']=false;
$_SESSION['empid']='';

header("Location:home.php");
?>
