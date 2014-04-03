<?php
include_once "core/connect.php";	

		// Is there a posted query string?
	if(isset($_POST['queryString'])) {
		
		$queryString = $_POST['queryString'];
						
		if(strlen($queryString) >0) {
	
			$stmt = $connexion->prepare('SELECT Surname FROM doctors WHERE Surname LIKE :queryString LIMIT 0,10');
			$query = $stmt->execute(array(':queryString' => $queryString . '%'));

			if($query) {
				while ($results = $stmt->fetch()) {

	         		echo '<li onClick="fill(\''.$results['Surname'].'\');">'.$results['Surname'].'</li>';
	         	}
			}
			else
			{
				echo 'ERROR: There was a problem with the query.';
			}
		} 
		else{
				// Dont do anything.
		} // There is a queryString.
	}
	else{
		echo 'There should be no direct access to this script!';
	}
	
?>
