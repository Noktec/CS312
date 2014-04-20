<?php 
/*
Information on the PHP Document :

This document is the main page once
logged in. This page displays information
on the doctors, and appointments. 
*/

include_once "core/connect.php";
session_start();

if (isset($_SESSION['id']) AND isset($_SESSION['email']))
{
    echo 'Hi ' . $_SESSION['email'];
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>login</title>

        <!-- Bootstrap core CSS -->
    <link href="CSS/bootstrap-mini.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" type="text/css" href="CSS/tables.css" media="all" />
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



	<table class="cornered generic">
		<caption>Registered Appointments</caption>
		<thead>
			<tr><th>Id<th>Doctors<th>Date
		</thead>
		<tbody>
			<tr><td>1<td>Citizen Kane<td>1941
			<tr><td>2<td>The Godfather<td>1972
			<tr><td>3<td>Casablanca<td>1942
			<tr><td>4<td>Raging Bull<td>1980
			<tr><td>5<td>Singin’ In The Rain<td>1952

	</table>

	<table class="cornered generic">
		<caption>Registered Appointments</caption>
		<thead>
			<tr><th>Id<th>Doctors<th>Date
		</thead>
		<tbody>
			<tr><td>1<td>Citizen Kane<td>1941
			<tr><td>2<td>The Godfather<td>1972
			<tr><td>3<td>Casablanca<td>1942
			<tr><td>4<td>Raging Bull<td>1980
			<tr><td>5<td>Singin’ In The Rain<td>1952
			
	</table>
    
    
</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <!--include the header-->
    <script> 
        $(function(){
        $("#header").load("mainheader.html"); 
        });
    </script> 
    <!-- verify the password -->
    <script type="text/javascript" SRC="JS/verifpassword.js"></script> 
  </body>
</html>


<?php
}
else{
		header("location: login.php");
}
