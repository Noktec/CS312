<?php 
session_start();
include_once "core/connect.php";

if (isset($_SESSION['id']) AND isset($_SESSION['email']))
{
?>


	

<?php    
}
else{
	header("location: login.php");
}
?>