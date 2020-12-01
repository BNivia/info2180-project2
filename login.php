<?php
    session_start();
    require_once('conn.php');

    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        if (isset($_POST)){
            $password = filter_var($_POST['pwrd'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);

            $q = $conn->query("SELECT email FROM users WHERE email = '$email'");
            $results = $q->fetchAll(PDO::FETCH_ASSOC);
            if ($results == null){
                echo "No such user exists.";
            }else {
                $_SESSION['email'] = $results[0]['email'];
                $q = $conn->query("SELECT pwrd FROM users WHERE email = '$email'");
                $results = $q->fetchAll(PDO::FETCH_ASSOC);
                if ($results[0]['pwrd'] === $password){
                    echo "Login successful.";
                }
            }
        }
    }catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
?>