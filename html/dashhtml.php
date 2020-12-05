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
        <div class="container">
            <div class="h-container">
                <header>
                    <ul>
                        <li><img src="../css/bug.png"></li>
                        <li><h1>BugMe Issue Tracker</h1></li>
                    </ul>
                    <h2>Logged In by User: <?= $_SESSION['email']?></h2>
                </header>
            </div>
            <main id="main">
                <aside id="sidebar">
                    <ul>
                        <li><a class="link" href="dashhtml.php">Home</a></li>
                        <li><a class="link" href="newUser.php">Add User</a></li>
                        <li><a class="link" href="NewIssuehtml.php">New Issue</a></li>
                        <li><a class="link" href="../php/logout.php">Logout</a></li>
                    </ul>
                </aside>
                <div class="h-line">
                    <h2>Issues </h2>
                    <button id="create">Create New Issue</button>
                </div>
                <div class="btn-group">
                    <p>Filter by: </p> 
                    <button id="all">ALL</button>
                    <button id="open">OPEN</button>
                    <button id="myTicket">MY TICKETS</button>
                </div>
                <table id="Issuestab"> 
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Assigned To</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody id="issue"></tbody>
                </table>
            </main>
        </div>
    </body>

</html>