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
            <aside id="sidebar">
                <ul>
                    <li><a class="link" href="dashhtml.php">Home</a></li>
                    <li><a class="link" href="newUser.php">Add User</a></li>
                    <li><a class="link" href="NewIssuehtml.php">New Issue</a></li>
                    <li><a class="link" href="">Logout</a></li>
                </ul>
            </aside>
            <header id="header">
                <h1>BugMe Issue Tracker</h1>
                <h2>Logged In by User: <?= $_SESSION['email']?></h2>
            </header>

            <main id="main">
                <h2>Issues </h2>
                
                <button id="create">Create New Issue</button>
                <div class="btn-group">
                    <p>Filter by: </p> 
                    <button id="all">ALL</button>
                    <button id="open">OPEN</button>
                    <button id="myTicket">MY TICKETS</button>
                </div>
               

                <table id="Issuestab"> 
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Type</th>
                            <th scope="col">Status</th>
                            <th scope="col">Assigned To</th>
                            <th scope="col">Created</th>
                        </tr>
                    </thead>
                    <tbody id="issue">
                        <!--
                        <tr >
                            <td id="title"><td>
                            <td id="type"><td>
                            <td id="status"><td>  
                            <td id="assigned"><td>
                            <td id="created"><td>
                        </tr> -->
                    </tbody>
                </table>
            </main>
        </div>
    </body>

</html>