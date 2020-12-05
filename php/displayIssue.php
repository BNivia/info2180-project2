<?php
    require_once('conn.php');


    /**$nregtest = "/^[a-z ,.'-]+$/"; **/
    $nregtest = "/^[A-Za-z.\s-]+$/";
    $regtest = "/^[0-9a-zA-Z]+$/";
    $eregtest = "/.{1,}@[^.]{1,}/";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        //echo "Connected to $dbname at $host successfully. <br>";
        $query = filter_input(INPUT_POST, "query", FILTER_SANITIZE_STRING);
        $query = strval($_POST["query"]);
        
        $query = filter_var(htmlentities($query), FILTER_SANITIZE_STRING);
        $query = html_entity_decode($query,ENT_QUOTES);
        
        $query = intval($query);
        if(true){      
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->query("SELECT s.id, s.title, s.description, s.type, s.status , u.firstname, u.lastname, s.created, s.updated 
            FROM issues s JOIN users u on s.assigned_to = u.id 
            WHERE s.id = $query ");
            
            $row = $sql->fetchAll(PDO::FETCH_ASSOC)[0];
            
        }

        if (isset($_POST["mark"]))
        {
            if($_POST["mark"]== "closed")
            {
                // This needs to be updated with the users id
                $sql = $conn->query("UPDATE issues SET status= 'Closed'
                WHERE issues.id = $query");

            }
            elseif($_POST["mark"]== "progress")
            {
                $sql = $conn->query("UPDATE issues SET status= 'In Progress'
                WHERE issues.id = $query");
            }    
        }
        
    } 
    catch (PDOException $pe) 
    {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }   
?>

<h1 id="Issue title"> <?=$row['title']; ?> </h1>
<p id="issueNo"> Issue#: <?= $row['id']?> </p>

<p id="desc"> <?= $row['description']?> </p>
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
    <br>
            <button id="closed">Mark as Closed</button>
            <br>
            <button id="progress">Mark as In Progress</button>
</aside>
<?php
$date = new DateTime($row['created']);
$created = $date->format('l, F d y h:i:s');

$date = new DateTime($row['updated']);
$updated = $date->format('l, F d y h:i:s');
?>
<p id="grey"> 
    
    <img id="arrow" src="../css/little-arrow.png"> This issue was created on: <?=$created; ?> 
    <br> 
    <img id="arrow" src="../css/little-arrow.png"> Last updated on: <?=$updated; ?>
</P>