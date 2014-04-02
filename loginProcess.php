<?php
include_once "core/connect.php";

//I do not salt the password though 
//but in real life i'd use bcrypt not sha512.
function hashPassword($password){
$hash = hash('sha512', $password);
return $hash;
}

if (isset($_POST['submit'])) {

	//we hash the password first.
	$password_retrieve = hashPassword($_POST['password']);
	$email = $_POST['email'];

	$stmt = $connexion->prepare('SELECT Patient_ID FROM patients WHERE Email = :Email AND Password = :Password');

	$stmt->bindParam(':Email',	  $email, 				PDO::PARAM_STR);
	$stmt->bindParam(':Password', $password_retrieve,	PDO::PARAM_STR);
    $stmt->execute();
	$results = $stmt->fetch();
	
	if(!$results) {
		header("location: login.php?error");
	}
	else
	{
		session_start();
   		$_SESSION['id'] = $results['Patient_ID'];
   		$_SESSION['email'] = $email;
    	header("location: login.php?sucess");
    
	}


}
?>