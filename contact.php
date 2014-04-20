<?php
/*
Information on the PHP Document :

This document allows user to contact
the administrators in case of problem.
*/

//this is the code that send the email.

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $to = 'admin@website.com'; 
    $verif = $_POST['verif'];

    //creates a uniq ticket number.
    $subject = uniqid();


    $body = "From: $name $surname\n E-Mail: $email\n Message:\n $message";

     if ($_POST['submit'] && $verif == '2') {                
        if (mail ($to, $subject, $body, $email)) { 
        //redirect to the contact page, and apply the success message.
        header("location: ./contact.php?success");
        } 
        else { 
        //redirect to the contact page, and apply the error message.
            header("location: ./contact.php?error");
        }
    } 
    else if ($_POST['submit'] && $verif != '2') {
        //redirect to the contact page, and apply the error message.
        header("location: ./contact.php?errorSpam");
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

    <title>Contact</title>

        <!-- Bootstrap core CSS -->
    <link href="CSS/bootstrap-mini.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" type="text/css" href="CSS/contact.css" />
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
    <section id="contact">
    <?php
        //these are the error, success messages to apply. 
        if(isset($_GET['error']))
        {
            echo "<div style='color: red;'> Something went wrong, go back and try again! </div>" ;
        }
        if(isset($_GET['errorSpam']))
        {
            echo "<div style='color: red;'> You answered the anti-spam incorrectly! </div>" ;
        }
        if(isset($_GET['success']))
        {
            echo "<div style='color: green;'> Your message has been sent!  </div>" ;
        }

    ?>

        <form name="contact" id="contact" method="post" action="contact.php">
            <h1>Contact</h1>
            <div>
                <input id="name" name="name" placeholder="name" required="" type="text"> 
            </div>
            <div>
                <input id="surname" name="surname" placeholder="surname" required="" type="text"> 
            </div>
            <div>
                <input id="email" name="email" placeholder="example@domain.com" required="" type="email"> 
            </div>
            <div>
               <textarea rows="4" cols="50" id="message" name="message" placeholder="Hi, ..." required="" type="text" type="textarea" ></textarea>
            </div>
            <div>
                <label>*What is the square root of 2? (Anti-spam)</label><br>
                <input name="verif" placeholder="2" id = "verif" required ="" type="text" pattern="^\s*([0-9])">
            </div>
            <div>
                <input class="buttom" name="submit" id="submit" tabindex="5" value="Send" type="submit">   
            </div>
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
