<?php
/*
Information on the PHP Document :

This document helps the user to get a
new password.
*/

include_once "core/connect.php";

//I do not salt the password though 
//but in real life i'd use bcrypt not sha512.
function hashPassword($password){
$hash = hash('sha512', $password);
return $hash;
}

if(isset($_POST['submit'])){

    $email = $_POST['email'];

    //create a new random password
    //reduces the password to 16 chars.
    $password =  substr(hash('sha512',rand()),0,16);

    //verify if the email is in the database 
    $stmt = $connexion->prepare('SELECT Email, Patient_ID FROM patients WHERE Email = :Email');

    $stmt->bindParam(':Email',    $email,               PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetch();
    

    if(!$results){

        header("location: ./forgotenPassword.php?error"); 
    }
    else{

        $id = $results['Patient_ID'];

        

        //we hash the password before setting it in the DB.
       $Hpassword = hashPassword($password);


       //we replace the password. 
        $stmt = $connexion->prepare('UPDATE patients SET  Password  = :Password  WHERE Patient_ID  = :Patient_ID');

        $stmt->bindParam(':Password',       $Hpassword,             PDO::PARAM_STR);
        $stmt->bindParam(':Patient_ID',     $id,                    PDO::PARAM_INT); 
        $stmt->execute();

        //we send the password by email to the user. Better solutions exists IRL. 
        
        $subject = "new Password";
        $body = "Your new password is $password";
        $to = $email;
                         
            if (mail ($to, $subject, $body)) { 
                //redirect to the contact page, and apply the success message.
                header("location: ./forgotenPassword.php?success");
            } 
            else { 
            //redirect to the contact page, and apply the error message.
                header("location: ./forgotenPassword.php?error");
            }
    }
}


?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Forgoten Password</title>

        <!-- Bootstrap core CSS -->
    <link href="CSS/bootstrap-mini.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" type="text/css" href="CSS/password.css" />
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
    <section id="Fpassword">
        <form name="forgoten" id="forgoten" method="post" action="forgotenPassword.php">
            <h1>Forgoten Password</h1>
            <div>
                <input id="email" name="email" placeholder="example@domain.com" required="" type="email"> 
            </div>
            <div>
                <input class="buttom" name="submit" id="submit" tabindex="5" value="Send New Password" type="submit">   
            </div>
            <?php
            // this tells if the password / email is wrong
            if(isset($_GET['error']))
            {
                echo "<div style='color: red;'> Wrong email. </div>" ;
            }
            if(isset($_GET['success']))
            {
                echo "<div style='color: green;'> Your new password has been generated. </div>" ;
            }
            ?>
        </form>
    </section>
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
  </body>
</html>
