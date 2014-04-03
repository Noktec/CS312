<?php
	include_once "core/connect.php";
	$surname = $_POST['data'];

	//we look up the ID of the corresponding user. 
	$stmt = $connexion->prepare('SELECT surname FROM doctors WHERE Surname like ? limit 0,20');
    $stmt->execute(array($surname+'%'));
	$results = $stmt->fetch();

	if(!results)
	{
		echo '<ul class="list">';
		while($row = mysql_fetch_array($result))
		{
			$str = strtolower($results['Surname'];);
			$start = strpos($str,$keyword); 
			$end   = similar_text($str,$keyword); 
			$last = substr($str,$end,strlen($str));
			$first = substr($str,$start,$end);
			
			$final = '<span class="bold">'.$first.'</span>'.$last;
		
			echo '<li><a href=\'javascript:void(0);\'>'.$final.'</a></li>';
		}
		echo "</ul>";
	}
	else
		echo 0;
?>	   
