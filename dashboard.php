<?php

$host = 'localhost';
$dbname = 'schema';
$username = 'admin';
$password = 'password123';

/**$nregtest = "/^[a-z ,.'-]+$/"; **/
$nregtest = "/^[A-Za-z.\s-]+$/";
$regtest = "/^[0-9a-zA-Z]+$/";
$eregtest = "/.{1,}@[^.]{1,}/";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    echo "Connected to $dbname at $host successfully. <br>";
    $query = filter_input(INPUT_POST, "query", FILTER_SANITIZE_STRING);


    if($_POST["query"]){      
        echo"DATA RECIEVED <br>";
        //$pwd = password_hash($pwd, $algo, $options = null);
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$conn->exec($sql);
    }
    $conn = null;
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}


?>