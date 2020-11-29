<?php

$host = 'localhost';
$dbname = 'schema';
$username = 'admin';
$password = 'password123';
$fname;
$lname;
$pwd;
$email;
$regtest = "/^[0-9a-zA-Z]+$/";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    echo "Connected to $dbname at $host successfully. <br>";
    $f = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_STRING);
    $l = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_STRING);
    $p = filter_input(INPUT_POST, "pwrd", FILTER_SANITIZE_STRING);
    $e = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);

    if (empty($f) || !preg_match ($regtest, $f)){
        echo"First Name Error <br>";
    }else{
        $fname = strval($f);
    }
    if (empty($l) || !preg_match ($regtest, $l)){
        echo"Last Name Error <br>";
    }else{
        $fname = strval($p);
    }
    if (empty($p) || !preg_match ($regtest, $p)){
        echo"Password Error <br>";
    }else{
        $fname = strval($p);
    }
    if (empty($e) || !preg_match ($regtest, $e)){
        echo"Email Error <br>";
    }else{
        $fname = strval($e);
    }
    
    if(isset($fname) && isset($lname) && isset($pwd) && isset($email)){      
        echo"DATA RECIEVED <br>";
        $pwd = password_hash($pwd, $algo, $options = null);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO users(firstname, lastname, pwrd, email)
        VALUES ('$fname', '$lname', '$pwd', '$email')";
        $conn->exec($sql);
    }
    $conn = null;
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}


?>