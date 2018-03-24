<?php
//here we will destroy the session 
session_start();
session_destroy();
//after destroying, we are redirect the logout.php to login.php page
header('location:../login.php');

?>

