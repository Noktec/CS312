<?php 

/*
Information on the PHP Document :

This document displays the information
on the patient.

*/

session_start();
include_once "core/connect.php";

if (isset($_SESSION['id']) AND isset($_SESSION['email']))
{

	$email = $_SESSION['email'];
	$id = $_SESSION['id'];

	//we look up the ID of the corresponding user. 
	$stmt = $connexion->prepare('SELECT * FROM patients WHERE Patient_ID = :Patient_ID');
	$stmt->bindParam(':Patient_ID',	  $id, 	PDO::PARAM_INT);
    $stmt->execute();
	$results = $stmt->fetch();
	$FirstName = $results['FirstName'];
    $LastName = $results['LastName'];
    $NINO = $results['NINO'];
    $Email= $results['Email'];
    $Phone= $results['Phone'];
    $Street = $results['Street'];
    $City = $results['City'];
    $County = $results['County'];
    $PostCode= $results['PostCode'];


?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile</title>

    <link rel="stylesheet" type="text/css" href="CSS/fetch.css" media="all" />      
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="JS/suggestion.js"></script> 
    <link href="CSS/bootstrap-mini.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet"  href="CSS/registration.css" media="all" />
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
  
      <div  class="update">
    		<form name="update" id="update" method="post" action="updateProfile.php">
    			<p class="contact"><label for="name">First Name</label></p> 
    			<input id="name" name="name" value="<?php echo $FirstName; ?>" required="" tabindex="1" type="text"></input>

    			<p class="contact"><label for="familyName">Last Name</label></p> 
    			<input id="familyName" name="familyName" value="<?php echo $LastName; ?>" required="" tabindex="2" type="text"> 

    			<p class="contact"><label for="NINO">National Insurance Number</label></p> 
    			<input id="NIN" name="NIN" value="<?php echo $NINO; ?>"required="required" tabindex="3" type="text" pattern="^\s*([a-zA-Z]){2}\s*([0-9]){1}\s*([0-9]){1}\s*([0-9]){1}\s*([0-9]){1}\s*([0-9]){1}\s*([0-9]){1}\s*([a-zA-Z]){1}?$" > 
    			<!-- nino regular expression -->

				<p class="FDR"><label for="FDR"> Family Doctor</label></p>
				<input type="text" name="FDR"  size="30" value="" id="FDR" tabindex="4" required=""  onkeyup="lookup(this.value);" onblur="fill();" />
				<div class="lookupBox" id="lookup" style="display: none;">
				<div class="list" id="autoList">
					&nbsp;
				</div>
				</div>
		      
                <p class="contact"><label for="street">Street and Number</label></p> 
                <input id="street" name="street" value="<?php echo $Street; ?>" required="" tabindex="5" type="text"> 

                <p class="contact"><label for="city">City</label></p> 
                <input id="city" name="city" value="<?php echo $City; ?>" required="" tabindex="6" type="text"> 

                <p class="contact"><label for="county">County</label></p> 
                <input id="county" name="county" value="<?php echo $County; ?>"required="" tabindex="7" type="text"> 

                <p class="contact"><label for="PostCode">PostCode</label></p> 
                <input id="postCode" name="postCode" value="<?php echo $PostCode; ?>" required="" tabindex="8" type="text" pattern="^(([gG][iI][rR] {0,}0[aA]{2})|((([a-pr-uwyzA-PR-UWYZ][a-hk-yA-HK-Y]?[0-9][0-9]?)|(([a-pr-uwyzA-PR-UWYZ][0-9][a-hjkstuwA-HJKSTUW])|([a-pr-uwyzA-PR-UWYZ][a-hk-yA-HK-Y][0-9][abehmnprv-yABEHMNPRV-Y]))) {0,}[0-9][abd-hjlnp-uw-zABD-HJLNP-UW-Z]{2}))$"> 
    			<!-- UK post code regular expression provided by https://www.gov.uk/ --> 

    		    <p class="contact"><label for="email">Email</label></p> 
    	       	<input id="email" name="email" value="<?php echo $Email; ?>" tabindex="9" required="" type="email"> 
        
                <p class="contact"><label for="phone">Mobile phone</label></p> 
                <input id="phone" name="phone" value="<?php echo $Phone; ?>" required=""  tabindex="10"type="text"> <br>

                <p class="contact"><label for="password">Create a password</label></p> 
                <input type="password" id="password" name="password"  tabindex="11"> 

                <p class="contact"><label for="repassword">Confirm your password</label></p> 
                <input type="password" id="repassword" name="repassword" tabindex="12"  oninput="check(this)"> 

                <span id="passwordValidity" class="passwordValidity"></br></span>
                
                <input class="buttom" name="update" id="update" tabindex="13" value="Update"  style="width:200px"  type="submit"> 	 
   		</form> 
                        

	</div>      
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <!--include the header-->
    <script> 
        $(function(){
        $("#header").load("header.html"); 
        });
    </script> 
    <!-- verify the password -->
    <script type="text/javascript" SRC="JS/verifpassword.js"></script> 
  </body>
</html>

<?php    
}
else{
	header("location: login.php");
}
?>