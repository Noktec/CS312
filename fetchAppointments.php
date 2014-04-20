<?php 

/*
Information on the PHP Document :

This document fetches the appointments
associated with the current patient. And
display the information in a table on the
main.php page.

*/

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