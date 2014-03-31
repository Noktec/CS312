<?php
$PARAM_hote='localhost'; 
$PARAM_port='3306';
$PARAM_db_name='CS312'; 
$PARAM_user='root'; 
$PARAM_password='root';
try
{
   $stm = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_db_name, $PARAM_user, $PARAM_password);
}
catch(Exception $e)
{
	echo 'Database connection error!';
    die();
}

?>
