<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BugMe Issue Tracker</title>
        <link rel="stylesheet" type="text/css" href="../css/newuser.css">
        <script type= "text/javascript" src="../js/newuserscript.js"></script>
    </head>
        <body>
        <div class="h-container">
                <header>
                    <ul>
                        <li><img src="css/bug.png"></li>
                        <li><h1>BugMe Issue Tracker</h1></li>
                    </ul>
                    <h2>Logged In by User: <?= $_SESSION['email']?></h2>
                </header>
            </div>
            <aside id="sidebar">
                <ul>
                    <li><a class="link" href="dashhtml.php">Home</a></li>
                    <li><a class="link" href="newUser.php" >Add User</a></li>
                    <li><a class="link" href="NewIssuehtml.php">New Issue</a></li>
                    <li><a class="link" href="logout.php">Logout</a></li>
                </ul>
            </aside>
            <h1>New User</h1>
            <form> 
                <div class="form">
                    <label for="fName">Firstname</label></br>
                    <input id="fName" type="text" name="fName"/></br></br>
            
                    <label for="lName">Lastname</label></br>
                    <input id="lName" type="text" name="lName"/></br></br>
    
                    <label for="passwrd">Password</label></br>
                    <input id="passwrd" type="password" name="passwrd"/></br></br>
    
                    <label for="email">Email</label></br>
                    <input id="email" type="text" name="email"/></br></br>
                
                    <button id="bttn" type="submit" name="bttn">Submit</button></br></br>
                </div>
            </form>
            
            <div id = "form-error"></div>
        </div>
    </body>
</html>