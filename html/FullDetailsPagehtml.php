<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BugMe Issue Tracker</title>
        <link rel="stylesheet" type="text/css" href="../css/details.css">
        <link rel="stylesheet" type="text/css" href="../css/index.css">
        <link rel="stylesheet" type="text/css" href="../css/newuser.css">
        <script type= "text/javascript" src="../js/displayIssue.js"></script>
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
        </div>
    
        <div id="main">
            
            <div id="item">

            </div>
            

        </div>     
    </body>
</html>