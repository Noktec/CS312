
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registration</title>

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

       
            <!--  Note that in html5 you do not need to close </input> -->
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

                <span id="passwordValidity" class="passwordValidity"><br></span>

            
            <input class="buttom" name="submit" id="submit" tabindex="5" value="Sign me up" type="submit"> 	 
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
