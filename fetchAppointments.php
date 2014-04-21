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

	function printError($ex){
		#These are simple debug info
	    $msg = $ex->errorInfo;
	    error_log(var_export($msg, true));
	    die("<p>Sorry, there was a database error. Debug data has been logged.</p>");
	}

	function getDR(){
			$id=$_SESSION['id'];

			
				//we look if there is the DB if the user has a family Dr. 
	    		$stmt = $connexion->prepare('SELECT doctors_Doctor_ID FROM doctors_has_patients WHERE patients_Patient_ID = :patients_Patient_ID');
	    		$stmt->bindParam(':patients_Patient_ID',	  $id, 	PDO::PARAM_INT);
	    		$stmt->execute();
				$results = $stmt->fetch();
			
				print_r($stmt->errorInfo());
			
				
			if($results){

			}
			else{
				echo "<tr><td><td>Please edit your profile and add your family doctor.<td><td><td>";
			}	
	}
}
else{
	header("location: login.php");
}
?>