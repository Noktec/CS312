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
    		<form id="RegistrationForm" method="post" action="registrationProcess.php">
    			<p class="contact"><label for="name">First Name</label></p> 
    			<input id="name" name="name" placeholder="First Name" required="" tabindex="1" type="text"> 

    			<p class="contact"><label for="familyName">Last Name</label></p> 
    			<input id="familyName" name="familyName" placeholder="Last Name" required="" tabindex="2" type="text"> 

    			<p class="contact"><label for="NINO">National Insurance Number</label></p> 
    			<input id="NIN" name="NIN" placeholder="NINO" required="" tabindex="3" type="text"> 

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
                <input type="password" id="repassword" name="repassword" required=""> 
            
            <input class="buttom" name="submit" id="submit" tabindex="5" value="Sign me up" type="submit"> 	 
   		</form> 
	</div>      
</div>
</body>
</html>
