<!DOCTYPE html>
<html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<title>Registration</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	<link rel="stylesheet" type="text/css" href="CSS/registration.css" media="all" />
    <script type="text/javascript" SRC="JS/verifpassword.js"></script> 
</head>
<body>
<div class="container">
			<header>
					<!-- place header here --> 
            </header>       
      <div  class="registration">
    		<form name="registrationForm" id="registrationForm" method="post" action="registrationProcess.php">
    			<p class="contact"><label for="name">First Name</label></p> 
    			<input id="name" name="name" placeholder="First Name" required="" tabindex="1" type="text"> 

    			<p class="contact"><label for="familyName">Last Name</label></p> 
    			<input id="familyName" name="familyName" placeholder="Last Name" required="" tabindex="2" type="text"> 

                <p class="contact"><label for="NINO">National Insurance Number</label></p> 
                <input id="NIN" name="NIN" value="<?php echo $NINO; ?>"required="required" tabindex="3" type="text" pattern="^\s*([a-zA-Z]){2}\s*([0-9]){1}\s*([0-9]){1}\s*([0-9]){1}\s*([0-9]){1}\s*([0-9]){1}\s*([0-9]){1}\s*([a-zA-Z]){1}?$" > 
                <!-- nino regular expression -->

                <p class="contact"><label for="street">Street and Number</label></p> 
                <input id="street" name="street" placeholder="Street and Number" required="" tabindex="4" type="text"> 

                <p class="contact"><label for="city">City</label></p> 
                <input id="city" name="city" placeholder="City" required="" tabindex="5" type="text"> 

                <p class="contact"><label for="county">County</label></p> 
                <input id="county" name="county" placeholder="County" required="" tabindex="6" type="text"> 

                <p class="contact"><label for="PostCode">PostCode</label></p> 
                <input id="postCode" name="postCode" value="<?php echo $PostCode; ?>" required="" tabindex="8" type="text" pattern="^(([gG][iI][rR] {0,}0[aA]{2})|((([a-pr-uwyzA-PR-UWYZ][a-hk-yA-HK-Y]?[0-9][0-9]?)|(([a-pr-uwyzA-PR-UWYZ][0-9][a-hjkstuwA-HJKSTUW])|([a-pr-uwyzA-PR-UWYZ][a-hk-yA-HK-Y][0-9][abehmnprv-yABEHMNPRV-Y]))) {0,}[0-9][abd-hjlnp-uw-zABD-HJLNP-UW-Z]{2}))$"> 
                <!-- UK post code regular expression provided by https://www.gov.uk/ --> 
    			 
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
