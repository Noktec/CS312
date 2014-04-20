
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

        <!-- Bootstrap core CSS -->
    <link href="CSS/bootstrap-mini.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" type="text/css" href="CSS/login.css" />
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
    <section id="login">
    <?php
        // this tells if the password / email is wrong
        if(isset($_GET['error']))
        {
            echo "<div style='color: red;'> Wrong email or password. </div>" ;
        }
    ?>
        <form name="login" id="login" method="post" action="loginProcess.php">
            <h1>Login</h1>
            <div>
                <input id="email" name="email" placeholder="example@domain.com" required="" type="email"> 
            </div>
            <div>
                <input type="password" placeholder="password" required="" id="password" name="password" />
            </div>
            <div>
                <input class="buttom" name="submit" id="submit" tabindex="5" value="Log in" type="submit">   
                <a href="#">Lost password</a>
                <a href="./registration.php">Register</a>
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
    <!-- verify the password -->
    <script type="text/javascript" SRC="JS/verifpassword.js"></script> 
  </body>
</html>
