<?php 
session_start();
//destroy the session. 
$_SESSION = array();
session_destroy();
?>