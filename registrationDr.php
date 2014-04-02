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
    		<form name="registrationForm" id="registrationForm" method="post" action="registrationProcessDr.php">
    			<p class="contact"><label for="name">First Name</label></p> 
    			<input id="name" name="name" placeholder="First Name" required="" tabindex="1" type="text"> 

    			<p class="contact"><label for="familyName">Last Name</label></p> 
    			<input id="familyName" name="familyName" placeholder="Last Name" required="" tabindex="2" type="text"> 

    			<p class="contact"><label for="speciality">Speciality</label></p> 
    			<input id="speciality" name="speciality" placeholder="Speciality" required="" tabindex="3" type="text"> 
            
                <p class="contact"><label for="phone">Phone</label></p> 
                <input id="phone" name="phone" placeholder="phone number" required="" type="text"> <br>

                <p class="contact"><label for="email">Email</label></p> 
                <input id="email" name="email" placeholder="example@domain.com" required="" type="email"> 

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
