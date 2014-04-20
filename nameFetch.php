<?php
/*
Information on the PHP Document :

This document makes the request to the
MySQL database to retrieve the name of
the doctor.  
*/

include_once "core/connect.php";	

	//This look up the name of your Doctor
	if(isset($_POST['queryString'])) {
		
		$queryString = $_POST['queryString'];
						
		if(strlen($queryString) >0) {
	
			//this part prepare the SQL
			$stmt = $connexion->prepare('SELECT Surname FROM doctors WHERE Surname LIKE :queryString LIMIT 0,10');
			$query = $stmt->execute(array(':queryString' => $queryString . '%'));

			if($query) {
				while ($results = $stmt->fetch()) {

	         		echo '<li onClick="fill(\''.$results['Surname'].'\');">'.$results['Surname'].'</li>';
	         	}
			}
			else
			{
				echo 'Error : Contact your administration';
			}
		} 
		else{
		//this is the blank part
		} 
	}
	else{
		header("location: login.php");
	}
	
	
?>


