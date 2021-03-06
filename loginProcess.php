<?php
/*
Information on the PHP Document :

This document log the patients to his 
main profile page. Verifying his password
and creating the sessions.  
*/

include_once "core/connect.php";

//I do not salt the password though 
//but in real life i'd use bcrypt not sha512.
function hashPassword($password){
$hash = hash('sha512', $password);
return $hash;
}

if (isset($_POST['submit'])){

	//we hash the password first.
	$password= $_POST['password'];
	$email = $_POST['email'];

	$password_retrieve = hashPassword($password);

	//we look up the ID of the corresponding user. 
	$stmt = $connexion->prepare('SELECT Patient_ID FROM patients WHERE Email = :Email AND Password = :Password');

	$stmt->bindParam(':Email',	  $email, 				PDO::PARAM_STR);
	$stmt->bindParam(':Password', $password_retrieve,	PDO::PARAM_STR);
    $stmt->execute();
	$results = $stmt->fetch();
	
	//if not found we send the user back to a login page.
	if(!$results) {
		header("location: login.php?error");
	}
	else
	{
		//we start the session.
		session_start();
   		$_SESSION['id'] = $results['Patient_ID'];
   		$_SESSION['email'] = $email;
    	header("location: main.php");
	}
	

}
?>