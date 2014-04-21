<?php
/*
Information on the PHP Document :

Is the PHP's Ajax call to book an
appointment from main.php
*/



session_start();
include_once "core/connect.php";

function printError($ex){
	#These are simple debug info
    $msg = $ex->errorInfo;
    error_log(var_export($msg, true));
    die("<p>Sorry, there was a database error. Debug data has been logged.</p>");
}

if (isset($_SESSION['id']) AND isset($_SESSION['email']))
{

	$email = $_SESSION['email'];
	$id = $_SESSION['id'];

	$AppointmentID = $_POST['id'];
	$free = 1;

	//Book Appointment.
	    try {
	        	$stmt = $connexion->prepare('UPDATE Appointments  SET  free 		= :free, 
	        														   Patient_ID 	= :Patient_ID
	        												 	  WHERE Appointment_ID =:Appointment_ID');

	        $stmt->bindParam(':free',  			$free,         			PDO::PARAM_INT);
	        $stmt->bindParam(':Patient_ID',		$id, 					PDO::PARAM_INT); 
	        $stmt->bindParam(':Appointment_ID', $AppointmentID,  		PDO::PARAM_INT);
	        $stmt->execute();
	        
	    } 
	    catch (PDOException $ex) {
	        printError($ex);
	        print_r($stmt2->errorInfo());
	    };

	echo "Appointment Booked";
	//redirect to main page


}
else{
	header("location: login.php");
}


?>