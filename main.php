<?php 
/*
Information on the PHP Document :

This document is the main page once
logged in. This page displays information
on the doctors, and appointments. 
*/

include_once "core/connect.php";

session_start();
	

	
//this function displays the Appointments for which the User is Registered / booked. 	
function getRegistered(){

	$id=$_SESSION['id'];
	$connexion = getConnexion();
	$stmt = $connexion->prepare('SELECT * FROM Appointments WHERE Patient_ID = :Patient_ID AND free = 1');
	$stmt->bindParam(':Patient_ID',    $id,  PDO::PARAM_INT);
	$stmt->execute();
    $results = $stmt->fetchAll();

    if($results){
		 	
		foreach ($results as $row) {
		//append text to the variable
		echo "<tr><td>".$row['Appointment_ID']."<td><td>".$row['date']."<td>".$row['hours']."<td>";    
		} 
			
	}
	else{
 		 echo "<tr><td><td>You do not have any Appointments<td><td><td>";
	}	

	
}

//this function gets back all the available appointments of this Dr. 
function getAppointments($doctor_ID, $FamilyDoctor){
	$connexion = getConnexion();
	//we get all the appointments associated to that Dr.
	$stmt = $connexion->prepare('SELECT * FROM Appointments WHERE Doctor_ID = :Doctor_ID AND free = 0');
	$stmt->bindParam(':Doctor_ID',    $doctor_ID,  PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll();
   // $rows =$stmt->rowCount();
	
	foreach ($results as $row) {
		//append text to the variable

		$book = '<input id="'.$row['Appointment_ID'].'" type="button" value="Book" onclick="myCall('.$row['Appointment_ID'].')" />';

		echo "<tr><td>".$row['Appointment_ID']."<td>".$FamilyDoctor."<td>".$row['date']."<td>".$row['hours']."<td>".$book."<td><td>";    
	}    
    

}

//this function gets back the name of the doctor.
function getDrName($doctor_ID){
		$connexion = getConnexion();
	 	$stmt = $connexion->prepare('SELECT Name FROM doctors WHERE Doctor_ID = :Doctor_ID');
        $stmt->bindParam(':Doctor_ID',    $doctor_ID,  PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetch();
        $FamilyDoctor = $results['Name'];
        return $FamilyDoctor; 
}

//this function returns the doctor associated with the patient.
function getDR(){
		$id=$_SESSION['id'];
		
		//we get the connexion first from core/connect.php and extend our DB connexion scope.
		$connexion = getConnexion();
		$stmt = $connexion->prepare('SELECT doctors_Doctor_ID FROM doctors_has_patients WHERE patients_Patient_ID = :ID');
		$stmt->bindParam(':ID',	  $id, 	PDO::PARAM_INT);
	    $stmt->execute();
		$results = $stmt->fetch();
		$doctor_ID = $results['doctors_Doctor_ID'];

		if($results){
		 	$FamilyDoctor  = getDrName($doctor_ID);
			getAppointments($doctor_ID, $FamilyDoctor);
			
		}
		else{
 		 	echo "<tr><td><td>Please edit your profile and add your family doctor.<td><td><td>";
		}	
}

if (isset($_SESSION['id']) AND isset($_SESSION['email']))
{
    
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>login</title>

        <!-- Bootstrap core CSS -->
    <link href="CSS/bootstrap-mini.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" type="text/css" href="CSS/tables.css" media="all" />
    <!-- Ajax Call to book an appointment -->
    <script type="text/javascript" SRC="JS/book.js"></script> 
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<body>
<div class="container">

	   <!--includes the menu-->
    <div id="header"></div>



	<table class="cornered generic">
		<caption>Book Your Appointment</caption>
		<thead>
			<tr><th>Id<th>Doctor<th>Date<th>Time<th>Book<th><th>
		</thead>
		<tbody>
			 <?php getDr(); ?>
		</table>

	<table class="cornered generic">
		<caption>Registered Appointments</caption>
		<thead>
			<tr><th>Id<th><th>Date<th>Time<th>
		</thead>
		<tbody>
			<?php getRegistered(); ?>
			
	</table>
    
    
</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <!--include the header-->
    <script> 
        $(function(){
        $("#header").load("mainheader.html"); 
        });
    </script> 
  </body>
</html>


<?php
}
else{
		header("location: login.php");
}
