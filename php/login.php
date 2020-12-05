<?php
    session_start();
    require_once('conn.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $pwd;
        $email;
    
        $regtest = "/^[0-9a-zA-Z]{8,}$/";
        $eregtest = "/.{1,}@[^.]{1,}/";
    
        try{
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
            $clean_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
            $clean_pswrd = filter_var($_POST['pwrd'], FILTER_SANITIZE_STRING);
           
            //EMAIL VALIDATION
            if (empty($clean_email) || !preg_match ($eregtest, $clean_email)){
                echo "Email Invalid";
            }else{
                $email = strval($clean_email);
            }
            //PASSWORD VALIDATION
            if (empty($clean_pswrd) || !preg_match ($regtest, $clean_pswrd)){
                echo "Password Invalid";
            }else{
                $pwd = strval($clean_pswrd);
            }
            if( isset($email)  && isset($pwd)){
                $q = $conn->query("SELECT email FROM users WHERE email = '$email'");
                $results = $q->fetchAll(PDO::FETCH_ASSOC);
                $_SESSION['email'] = $results[0]['email'];
                $q = $conn->query("SELECT pwrd FROM users WHERE email = '$email'");
                $results = $q->fetchAll(PDO::FETCH_ASSOC);
                if (password_verify(strval($pwd), $results[0]['pwrd'])){
                    echo "Login successful.";
                }
            }else{
                echo "Error.";
            }
        }catch (PDOException $pe) {
            die("Could not connect to the database $dbname :" . $pe->getMessage());
        }catch(Exception $e){
            //no comment
        }
    }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
?>