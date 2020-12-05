<?php
session_start();
require_once('conn.php');
$email = $_SESSION['email']; 
$title;
$desc;
$assigned;
$type;
$priority;
$nregtest = "/^[A-Za-z.\s-]+$/";


try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $action = filter_var($_GET['action'], FILTER_SANITIZE_STRING);
    switch($action){
        case 'getnames':
            $mysql = $conn->query("SELECT firstname, lastname FROM users");
            $allusers = $mysql->fetchAll(PDO::FETCH_ASSOC);
            $select_div = '<select>';
            foreach($allusers as $row){
                $option = "<option value='{$row['firstname']} {$row['lastname']}'>{$row['firstname']} {$row['lastname']}</option>";
                $select_div .= $option;
            }
            $select_div .= "</select>";
            echo $select_div;
        break;

        case 'submit':
            $clean_title = filter_var($_GET['title'], FILTER_SANITIZE_STRING);
            $clean_desc = filter_var($_GET['description'], FILTER_SANITIZE_STRING);
            $clean_assigned = filter_var($_GET['assign'], FILTER_SANITIZE_STRING);
            $clean_type = filter_var($_GET['type'], FILTER_SANITIZE_STRING);
            $clean_priority = filter_var($_GET['priority'], FILTER_SANITIZE_STRING);

            print_r($_GET['type']);
            //Iitle VALIDATION
            if (empty($clean_title) || !preg_match ($nregtest, $clean_title)){
                echo "Title Invalid";
            }else{
                $title = strval($clean_title);
            }
            //Description VALIDATION
            if (empty($clean_desc) || !preg_match ($nregtest, $clean_desc)){
                echo "Description Invalid";
            }else{
                $desc = strval($clean_desc);
            }
            //Assigned VALIDATION
            if (empty($clean_assigned) || !preg_match ($nregtest, $clean_assigned)){
                echo "Assigned Invalid";
            }else{
                $assigned = $clean_assigned;
            }
            //Type VALIDATION
            if (empty($clean_type) || !preg_match ($nregtest, $clean_type)){
                echo "Type Invalid";
            }else{
                $type = $clean_type;
            }
            //priority VALIDATION
            if (empty($clean_priority) || !preg_match ($nregtest, $clean_priority)){
                echo "Priority Invalid";
            }else{
                $priority = strval($clean_priority);
            }
        
            if(isset($title) && isset($desc) && isset($assigned) && isset($type) && isset($priority) ){
                $name = explode(" ", $assigned); 
                $fname = strval($name[0]);
                $lname = strval($name[1]);
                $idsql = $conn->query("SELECT `id` FROM `users` WHERE `firstname` = '$fname' AND `lastname` = '$lname'");
                $assigned = $idsql->fetchAll(PDO::FETCH_ASSOC);
                $assigned_id = intval($assigned[0]);
               
                
                $newidsql = $conn->query("SELECT `id` FROM `users` WHERE email = '$email'");
                $created_id = $newidsql->fetchAll(PDO::FETCH_ASSOC);
                $created = intval($created_id[0]);
                var_dump($assigned_id);
                var_dump($created);


                
                $conn->query("INSERT INTO `issues`(`title`,`description`, `type`, `priority`, `status`, `assigned_to`, `created_by`) VALUES ('$title', '$desc', '$type', '$priority', 'Open', $assigned_id, $created)");
                echo "SUCESSFUL!!!";
        
        
            }else{
                echo "Error.";
            }
         break;
    }
    
}catch(Exception $e){
    //Throw Exception
}

?>

