
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registration</title>

        <!-- Bootstrap core CSS -->
    <link href="CSS/bootstrap-mini.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" type="text/css" href="CSS/registration.css" media="all" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!--includes the menu-->
    <div id="header"></div>

    <div class="container">

        <div  class="registration">
        <form name="registrationForm" id="registrationForm" method="post" action="registrationProcess.php">
          <p class="contact"><label for="name">First Name</label></p> 
          <input id="name" name="name" placeholder="First Name" required="" tabindex="1" type="text"> 

          <p class="contact"><label for="familyName">Last Name</label></p> 
          <input id="familyName" name="familyName" placeholder="Last Name" required="" tabindex="2" type="text"> 

                <p class="contact"><label for="NINO">National Insurance Number</label></p> 
                <input id="NIN" name="NIN" value=""required="" tabindex="3" type="text" pattern="^\s*([a-zA-Z]){2}\s*([0-9]){1}\s*([0-9]){1}\s*([0-9]){1}\s*([0-9]){1}\s*([0-9]){1}\s*([0-9]){1}\s*([a-zA-Z]){1}?$"> 
                <!-- nino regular expression -->

                <p class="contact"><label for="street">Street and Number</label></p> 
                <input id="street" name="street" placeholder="Street and Number" required="" tabindex="4" type="text"> 

                <p class="contact"><label for="city">City</label></p> 
                <input id="city" name="city" placeholder="City" required="" tabindex="5" type="text"> 

                <p class="contact"><label for="county">County</label></p> 
                <input id="county" name="county" placeholder="County" required="" tabindex="6" type="text"> 

                <p class="contact"><label for="PostCode">PostCode</label></p> 
                <input id="postCode" name="postCode" value="" required="" tabindex="8" type="text" pattern="^(([gG][iI][rR] {0,}0[aA]{2})|((([a-pr-uwyzA-PR-UWYZ][a-hk-yA-HK-Y]?[0-9][0-9]?)|(([a-pr-uwyzA-PR-UWYZ][0-9][a-hjkstuwA-HJKSTUW])|([a-pr-uwyzA-PR-UWYZ][a-hk-yA-HK-Y][0-9][abehmnprv-yABEHMNPRV-Y]))) {0,}[0-9][abd-hjlnp-uw-zABD-HJLNP-UW-Z]{2}))$"> 
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
