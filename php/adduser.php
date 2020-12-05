<?php
require_once('conn.php');

$fname;
$lname;
$pwd;
$email;
/**$nregtest = "/^[a-z ,.'-]+$/"; **/
$nregtest = "/^[A-Za-z.\s-]+$/";
$regtest = "/^[0-9a-zA-Z]+$/";
$eregtest = "/.{1,}@[^.]{1,}/";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    echo "Connected to $dbname at $host successfully. <br>";
    $f = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_STRING);
    $l = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_STRING);
    $p = filter_input(INPUT_POST, "pwrd", FILTER_SANITIZE_STRING);
    $e = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);

    if (empty($f) || !preg_match ($nregtest, $f)){
        echo"First Name Error <br>";
    }else{
        $fname = strval($f);
        echo"First Name WERK!! <br>";
    }
    if (empty($l) || !preg_match ($nregtest, $l)){
        echo"Last Name Error <br>";
    }else{
        $lname = strval($l);
        echo"Last Name OK!! <br>";
    }
    if (empty($p) || !preg_match ($regtest, $p)){
        echo"Password Error <br>";
    }else{
        $pwd = strval($p);
        echo"Password ALRIGHT <br>";
    }
    if (empty($e) || !preg_match ($eregtest, $e)){
        echo"Email Error <br>";
    }else{
        $email = strval($e);
        echo"Email WERKING!! <br>";
    }
    
    if(isset($fname) && isset($lname) && isset($pwd) && isset($email)){      
        echo"DATA RECIEVED <br>";
        //$pwd = password_hash($pwd, $algo, $options = null);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pswrd = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(firstname, lastname, pwrd, email)
        VALUES ('$fname', '$lname', '$pswrd', '$email')";
        $conn->exec($sql);
    }
    $conn = null;
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}


?>