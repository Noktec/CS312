<?php
include_once "core/connect.php";	

		// Is there a posted query string?
		if(isset($_POST['queryString'])) {
			$queryString = $_POST['queryString']);
						
			if(strlen($queryString) >0) {

				
				$stmt = $connexion->prepare('SELECT Surname FROM doctors WHERE Surname LIKE :queryString LIMIT 0,10');
				$results =$stmt->execute(array(':queryString' => $queryString . '%'));


				if($results) {
					// While there are results loop through them - fetching an Object (i like PHP5 btw!).
					while ($result = $query ->fetch_object()) {
						// Format the results, im using <li> for the list, you can change it.
						// The onClick function fills the textbox with the result.
						
						// YOU MUST CHANGE: $result->value to $result->your_colum
	         			echo '<li onClick="fill(\''.$result->value.'\');">'.$result->value.'</li>';
	         		}
				} else {
					echo 'ERROR: There was a problem with the query.';
				}
			} else {
				// Dont do anything.
			} // There is a queryString.
		} else {
			echo 'There should be no direct access to this script!';
		}
	}
?>
