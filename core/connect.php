<?php
$PARAM_hote='localhost'; 
$PARAM_port='3306';
$PARAM_db_name='CS312'; 
$PARAM_user='root'; 
$PARAM_password='root';
try
{
   $connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_db_name, $PARAM_user, $PARAM_password);
}
catch(Exception $e)
{
	echo 'Database connection error!';
    die();
}

//this is used when function need to access the database and extend our scope.
//such as in the main.php file.
function getConnexion() {

$PARAM_hote='localhost'; 
$PARAM_port='3306';
$PARAM_db_name='CS312'; 
$PARAM_user='root'; 
$PARAM_password='root';


    static $connexion = null;
    if (is_null($connexion)) {
        $connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_db_name, $PARAM_user, $PARAM_password);
    }
    return $connexion;
}

?>