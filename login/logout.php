<?php
session_start();
$con = mysqli_connect('localhost','root','','website');
$sql = "update websignup set status='offline' where email='{$_SESSION['email']}'";
$query = mysqli_query($con,$sql);
session_unset();

session_destroy();
header('location:login.php');
?>