<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BugMe Issue Tracker</title>
    <link rel="stylesheet" type="text/css" href="../css/Dashboard.css">
    <script type= "text/javascript" src="../js/dashboard.js"></script>
</head>
    
    <body>
        <div class="h-container">
            <header>
                <ul>
                    <li><img src="../css/bug.png"></li>
                    <li><h1>BugMe Issue Tracker</h1></li>
                </ul>
            </header>
        </div>
       
            <aside id="sidebar">
                
                    <li><img src="../css/home.png"><a class="link" href="dashhtml.php">Home</a></li>
                    <li><img src="../css/adduser.png"><a class="link" href="newUser.php">Add User</a></li>
                    <li><img src="../css/add.png"><a class="link" href="NewIssuehtml.php">New Issue</a></li>
                    <li><img src="../css/logout.png"><a class="link" href="../php/logout.php">Logout</a></li>
                
            </aside>
            <div class="h-line">
                <h2>Issues 
                <button id="create">Create New Issue</button>
                </h2>
            </div>
            <div class="btn-group">
                <p>Filter by: 
                <button id="all">ALL</button>
                <button id="open">OPEN</button>
                <button id="myTicket">MY TICKETS</button>
                </p>
            </div></br></br>
            <table id="Issuestab"> 
                <thead>
                    <tr>
                        <th id="t1">Title</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Assigned To</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody id="issue"></tbody>
            </table>
       
    </body>

</html>