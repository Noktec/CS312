<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>login</title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
<link rel="stylesheet" type="text/css" href="CSS/login.css" />

</head>
<body>
<div class="container">
    <section id="login">
        <form name="login" id="login" method="post" action="login.php">
            <h1>Login</h1>
            <div>
                <input type="text" placeholder="Email" required="" id="email" />
            </div>
            <div>
                <input type="password" placeholder="Password" required="" id="password" />
            </div>
            <div>
                <input type="submit" value="Log in" />
                <a href="#">Lost password</a>
                <a href="#">Register</a>
            </div>
        </form>
    </section>
</div>
</body>
</html>