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
        //echo "Connected to $dbname at $host successfully. <br>";
        $query = filter_input(INPUT_GET, "query", FILTER_SANITIZE_STRING);
        $query = strval($_GET["query"]);
        
        $query = filter_var(htmlentities($query), FILTER_SANITIZE_STRING);
        $query = html_entity_decode($query,ENT_QUOTES);
        //echo $query;
        $query = intval($query);
        if(true){      
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->query("SELECT s.id, s.title, s.description, s.type, s.status , u.firstname, u.lastname, s.created 
            FROM issues s JOIN users u on s.assigned_to = u.id 
            WHERE s.id = $query ");
            
            $row = $sql->fetchAll(PDO::FETCH_ASSOC)[0];
            
        }
        $conn = null;
    } 
    catch (PDOException $pe) 
    {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }   
?>

<h1 id="Issue title"> <?=$row['title']; ?> </h1>
<p id="issueNo"> Issue#: <?= $row['id']?> </p>

<p> <?= $row['description']?> </p>
<p> <?=$row['created']; ?> </P>
<aside id="right">
    <div id="info">
        <h6>Assigned to:</h6>
        <p><?= $row['firstname'];?>  <?=$row['lastname']; ?></p>

        <h6>Type</h6>
        <p><?= $row['type']; ?></p>

        <h6>Priority</h6>
        <p>Major</p>

        <h6>Status</h6>
        <p><?= $row['status']; ?></p>
    </div>
    <button id="closed">Mark as Closed</button>
    <br>
    <button id="progress">Mark as In Progress</button>
</aside>
