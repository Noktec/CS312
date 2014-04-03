<?php 
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

?>

<!DOCTYPE html>
<html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<title>Profile Information</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	<link rel="stylesheet" type="text/css" href="CSS/registration.css" media="all" />	
 	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 	<script LANGUAGE="JavaScript" src="js/script.js"></script>

 	<script type="text/javascript">
	function lookup(inputString) {
		if(inputString.length == 0) {
			// Hide the suggestion box.
			$('#suggestions').hide();
		} else {
			$.post("rpc.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').show();
					$('#autoSuggestionsList').html(data);
				}
			});
		}
	} // lookup
	
	function fill(thisValue) {
		$('#inputString').val(thisValue);
		setTimeout("$('#suggestions').hide();", 200);
	}
</script>

</head>
<body>
<div class="container">
			<header>
					<!-- place header here --> 
            </header>       
      <div  class="update">
    		<form name="update" id="update" method="post" action="updateProfile.php">
    			<p class="contact"><label for="name">First Name</label></p> 
    			<input id="name" name="name" placeholder="First Name" required="" tabindex="1" type="text"> 

    			<p class="contact"><label for="familyName">Last Name</label></p> 
    			<input id="familyName" name="familyName" placeholder="Last Name" required="" tabindex="2" type="text"> 

    			<p class="contact"><label for="NINO">National Insurance Number</label></p> 
    			<input id="NIN" name="NIN" placeholder="NINO" required="" tabindex="3" type="text"> 

    			<p class="FamilyDr"><label for="FDR"> Family Doctor</label></p>
				<input type="text"  name="FDR "id="FDR" tabindex="0" required="" >

				<div>
				Type your county:
					<input type="text" size="30" value="" id="inputString" onkeyup="lookup(this.value);" onblur="fill();" />
				</div>
			
				<div class="suggestionsBox" id="suggestions" style="display: none;">
				<div class="suggestionList" id="autoSuggestionsList">
					&nbsp;
				</div>
				</div>
		      

                <p class="contact"><label for="street">Street and Number</label></p> 
                <input id="street" name="street" placeholder="Street and Number" required="" tabindex="4" type="text"> 

                <p class="contact"><label for="city">City</label></p> 
                <input id="city" name="city" placeholder="City" required="" tabindex="5" type="text"> 

                <p class="contact"><label for="county">County</label></p> 
                <input id="county" name="county" placeholder="County" required="" tabindex="6" type="text"> 

                <p class="contact"><label for="PostCode">PostCode</label></p> 
                <input id="postCode" name="postCode" placeholder="PostCode" required="" tabindex="7" type="text"> 
    			 
    		    <p class="contact"><label for="email">Email</label></p> 
    	       	<input id="email" name="email" placeholder="example@domain.com" required="" type="email"> 
        
                <p class="contact"><label for="phone">Mobile phone</label></p> 
                <input id="phone" name="phone" placeholder="phone number" required="" type="text"> <br>

                <p class="contact"><label for="password">Create a password</label></p> 
                <input type="password" id="password" name="password" required=""> 

                <p class="contact"><label for="repassword">Confirm your password</label></p> 
                <input type="password" id="repassword" name="repassword" required="" oninput="check(this)"> 

                <span id="passwordValidity" class="passwordValidity"></br></span>
                
                <input class="buttom" name="submit" id="submit" tabindex="5" value="Sign me up" type="submit"> 	 
   		</form> 
                        

	</div>      
</div>
</body> 

</html>


<?php    
}
else{
	header("location: login.php");
}
?>