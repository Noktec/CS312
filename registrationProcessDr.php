<?php
include_once "core/connect.php";

//I do not salt the password though 
//but in real life i'd use bcrypt not sha512.
function hashPassword($password){
$hash = hash('sha512', $password);
return $hash;
}

if (isset($_POST['submit'])) {
    try {
        $stmt = $connexion->prepare('INSERT INTO doctors(
            Name, 
            Surname, 
            Speciality,
            PhoneNumber,  
            Password,
            Email)
        VALUES(
            :Name, 
            :Surname, 
            :Speciality, 
            :PhoneNumber, 
            :Password,
            :Email)');


        //we hash the password first.
        $password = hashPassword($_POST['password']);

        $stmt->bindParam(':Name',       $_POST['name'],         PDO::PARAM_STR);
        $stmt->bindParam(':Surname',    $_POST['familyName'],   PDO::PARAM_STR);
        $stmt->bindParam(':Speciality', $_POST['speciality'],   PDO::PARAM_STR);
        $stmt->bindParam(':PhoneNumber',$_POST['phone'],        PDO::PARAM_STR);
        $stmt->bindParam(':Password',   $password,              PDO::PARAM_STR);
        $stmt->bindParam(':Email',      $_POST['email'],        PDO::PARAM_STR);
        $stmt->execute();
        } 
    catch (PDOException $ex) {
        #These are simple debug info
        $msg = $ex->errorInfo;
        error_log(var_export($msg, true));
        die("<p>Sorry, there was an unrecoverable database error. Debug data has been logged.</p>");
        #print_r($stmt->errorInfo());
    };
}
?>