include_once "core/connect.php"

<?php
//this is the prepared statement used to avoid SQL Injections 
//when we create a user into the database. 
$stmt = $pdo->prepare('INSERT INTO patient(Patient_ID, FistName, LastName, NINO, Email, Password, Phone, Street, City, County, PostCode ) 
VALUES(:Patient_ID, :FistName, :LastName, :NINO, :Email, :Password, :Phone, :Street, :City, :County, :PostCode)');

$stmt->bindParam('Patient_ID', $Patient_ID, PDO::PARAM_INT);
$stmt->bindParam('FirstName', $FirstName, PDO::PARAM_STR);
$stmt->bindParam('LasttName', $LastName, PDO::PARAM_STR);
$stmt->bindParam('NINO', $NINO, PDO::PARAM_STR);
$stmt->bindParam('Email', $Email, PDO::PARAM_STR);
$stmt->bindParam('Password', $Password, PDO::PARAM_STR);
$stmt->bindParam('Phone', $Phone, PDO::PARAM_STR);
$stmt->bindParam('Street', $Street, PDO::PARAM_STR);
$stmt->bindParam('City', $City, PDO::PARAM_STR);
$stmt->bindParam('County', $County, PDO::PARAM_STR);
$stmt->bindParam('PostCode', $PostCode, PDO::PARAM_STR);

$stmt->execute();


?>

<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	<link rel="stylesheet" type="text/css" href="CSS/registration.css" media="all" />

</head>
<body>
<div class="container">
			<header>
					<!-- place header here --> 
            </header>       
      <div  class="registration">
    		<form id="RegistrationForm" method="post" action="">
    			<p class="contact"><label for="name">First Name</label></p> 
    			<input id="name" name="name" placeholder="First Name" required="" tabindex="1" type="text"> 

    			<p class="contact"><label for="FamilyName">Last Name</label></p> 
    			<input id="FamilyName" name="FamilyName" placeholder="Last Name" required="" tabindex="2" type="text"> 

    			<p class="contact"><label for="Speciality">Speciality</label></p> 
    			<input id="Speciality" name="Speciality" placeholder="Speciality" required="" tabindex="3" type="text"> 
            
                <p class="contact"><label for="phone">Mobile phone</label></p> 
                <input id="phone" name="phone" placeholder="phone number" required="" type="text"> <br>

                <p class="contact"><label for="password">Create a password</label></p> 
                <input type="password" id="password" name="password" required=""> 
                <p class="contact"><label for="repassword">Confirm your password</label></p> 
                <input type="password" id="repassword" name="repassword" required=""> 
            
            <input class="buttom" name="submit" id="submit" tabindex="5" value="Sign me up" type="submit"> 	 
   		</form> 
	</div>      
</div>
</body>
</html>
