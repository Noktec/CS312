<?php
include_once "core/connect.php";


if (isset($_POST['submit'])) {

     try {
        $stmt = $connexion->prepare('INSERT INTO patients(
            FirstName, 
            LastName, 
            NINO, 
            Email, 
            Password, 
            Phone, 
            Street, 
            City, 
            County, 
            PostCode)
        VALUES(
            :FirstName, 
            :LastName, 
            :NINO, 
            :Email, 
            :Password, 
            :Phone, 
            :Street, 
            :City, 
            :County, 
            :PostCode)');


        $stmt->bindParam(':FirstName',  $_POST['name'],         PDO::PARAM_STR);
        $stmt->bindParam(':LastName',   $_POST['familyName'],   PDO::PARAM_STR);
        $stmt->bindParam(':NINO',       $_POST['NIN'],          PDO::PARAM_STR);
        $stmt->bindParam(':Email',      $_POST['email'],        PDO::PARAM_STR);
        $stmt->bindParam(':Password',   $_POST['password'],      PDO::PARAM_STR);
        $stmt->bindParam(':Phone',      $_POST['phone'],        PDO::PARAM_STR);
        $stmt->bindParam(':Street',     $_POST['street'],       PDO::PARAM_STR);
        $stmt->bindParam(':City',       $_POST['city'],         PDO::PARAM_STR);
        $stmt->bindParam(':County',     $_POST['county'],       PDO::PARAM_STR);
        $stmt->bindParam(':PostCode',   $_POST['postCode'],     PDO::PARAM_STR);
        $stmt->execute();
        } 
    catch (PDOException $ex) {
        $msg = $ex->errorInfo;
        error_log(var_export($msg, true));
        die("<p>Sorry, there was an unrecoverable database error. Debug data has been logged.</p>");
    };



}

?>