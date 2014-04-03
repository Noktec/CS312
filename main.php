<?php 
include_once "core/connect.php";
session_start();

if (isset($_SESSION['id']) AND isset($_SESSION['email']))
{
    echo 'Hi ' . $_SESSION['email'];
}
else{
		header("location: login.php");
}