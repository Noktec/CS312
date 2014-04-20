<?php 

/*
Information on the PHP Document :
This PHP file update the profile information
of each patient back to the database. 

The call to this pages is made by the file
information.php
*/
session_start();
include_once "core/connect.php";

function hashPassword($password){
$hash = hash('sha512', $password);
return $hash;
}

function printError($ex){
	#These are simple debug info
    $msg = $ex->errorInfo;
    error_log(var_export($msg, true));
    die("<p>Sorry, there was a database error. Debug data has been logged.</p>");
}

//we check that we have a session.
if (isset($_SESSION['id']) AND isset($_SESSION['email']))
{

	$id = $_SESSION['id'];

	//we check if the POST information is not empty.
	if (isset($_POST['update'])) {

        $password = $_POST['password'];
        $password = str_replace(' ', '', $password);

        if(isset($password) && $password != NULL){

        	//we hash the password.
        	$password = hashPassword($password);
        }
        else{ 
        //if password is empty we get the password first.   
        	try{
        		
	        	$stmt = $connexion->prepare('SELECT Password FROM patients WHERE Patient_ID = :Patient_ID');
	        	$stmt->bindParam(':Patient_ID',	  $id, 	PDO::PARAM_INT);
	        	$stmt->execute();
				$results = $stmt->fetch();
				$password = $results['Password'];
			}
			catch(PDOException $ex){
				printError($ex);
				print_r($stmt->errorInfo());
			};   
        }	

        echo $password;


        //update informations.
	    try {
	        	$stmt2 = $connexion->prepare('UPDATE patients  SET 	Patient_ID 	= :Patient_ID, 
	        													 	FirstName 	= :FirstName,   
	        													 	LastName 	= :LastName,
	        													 	NINO 		= :NINO,
	        													 	Email 		= :Email,
	        													 	Password 	= :Password,
	        													 	Phone 		= :Phone,
	        													 	Street 		= :Street,
	        													 	City 		= :City,
	        													 	County 		= :County,
	        													 	PostCode 	= :PostCode
	        												 	WHERE Patient_ID =:Patient_ID');

	        $stmt2->bindParam(':Patient_ID',	$id, 					PDO::PARAM_INT);
	        $stmt2->bindParam(':FirstName',  $_POST['name'],         PDO::PARAM_STR);
	        $stmt2->bindParam(':LastName',   $_POST['familyName'],   PDO::PARAM_STR);
	        $stmt2->bindParam(':NINO',       $_POST['NIN'],          PDO::PARAM_STR);
	        $stmt2->bindParam(':Email',      $_POST['email'],        PDO::PARAM_STR);
	        $stmt2->bindParam(':Password',   $password,              PDO::PARAM_STR);
	        $stmt2->bindParam(':Phone',      $_POST['phone'],        PDO::PARAM_STR);
	        $stmt2->bindParam(':Street',     $_POST['street'],       PDO::PARAM_STR);
	        $stmt2->bindParam(':City',       $_POST['city'],         PDO::PARAM_STR);
	        $stmt2->bindParam(':County',     $_POST['county'],       PDO::PARAM_STR);
	        $stmt2->bindParam(':PostCode',   $_POST['postCode'],     PDO::PARAM_STR);
	        $stmt2->execute();
	        
	    } 
	    catch (PDOException $ex) {
	        printError($ex);
	        print_r($stmt2->errorInfo());
	    };

	    //We do not allow any Doctor Update.

	    //this adds the patient to the doctor, in table Doctors_has_patients
    	try {
    		//first we need to know the ID of the doctor the patient has.
    		$doctor = $_POST['FDR'];
    		$stmt3 = $connexion->prepare('SELECT Doctor_ID FROM doctors WHERE Name = :FDR');
    		$stmt3->bindParam(':FDR',	  $doctor, 	PDO::PARAM_STR);
    		$stmt3->execute();
			$results = $stmt3->fetch();
			$doctor_id = $results['Doctor_ID'];
    	}
    	catch (PDOException $ex) {
    		echo "7";
    		printError($ex);
    		print_r($stmt3->errorInfo());
        };

        //then we can update the patients doctors in the table Doctors_has_patients.
        try{
        	echo "8";
        	 $stmt4 = $connexion->prepare('INSERT INTO doctors_has_patients(
        	doctors_Doctor_ID,
        	patients_Patient_ID)
        VALUES(
            :doctors_Doctor_ID, 
            :patients_Patient_ID)');
	
			$stmt4->bindParam(':doctors_Doctor_ID', 		$doctor_id,     PDO::PARAM_INT);
        	$stmt4->bindParam(':patients_Patient_ID',   	$id,   			PDO::PARAM_INT);
			$stmt4->execute();
        }
        catch(PDOException $ex){
			printError($ex);
			print_r($stmt4->errorInfo());
        };

	}
}
//no session = redirection.
else{
		header("location: login.php");
}
?>