<?php

    $host = 'localhost';
    $dbname = 'schema';
    $username = 'admin';
    $password = 'password123';

    $allowedMethods = array(
        'POST'
    );

    /**$nregtest = "/^[a-z ,.'-]+$/"; **/
    $nregtest = "/^[A-Za-z.\s-]+$/";
    $regtest = "/^[0-9a-zA-Z]+$/";
    $eregtest = "/.{1,}@[^.]{1,}/";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        //echo "Connected to $dbname at $host successfully. <br>";
        $query = filter_input(INPUT_POST, "query", FILTER_SANITIZE_STRING);

        
        if($_POST["query"]){      
            //echo"DATA RECIEVED <br>";
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $conn->query("SELECT s.id, s.title, s.type, s.status , u.firstname, u.lastname, s.created 
            FROM issues s JOIN users u on s.assigned_to = u.id ");
            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        $conn = null;
    } 
    catch (PDOException $pe) 
    {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }

    

?>

<?php foreach ($results as $row): ?>
    <tr>
        <td scope="col"> <b>#<?= $row['id']?></b>  <a href="FullDetailsPage.html?query=<?= $row['id']?>"><?=$row['title']; ?></a>   </td>
        <td scope="col"><?= $row['type']; ?></td>
        <td scope="col"><?= $row['status']; ?></td>
        <td scope="col"><?= $row['firstname'];?> <?=$row['lastname']; ?></td>
        <td scope="col"><?= $row['created']; ?></td>
    </tr>
<?php endforeach; ?>