<?php
 session_start();
 $id = $_SESSION['id'];
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
                        <li><img src="../css/bug.png"></li>
                        <li><h1>BugMe Issue Tracker</h1></li>
                    </ul>
                </header>
            </div>
            <aside id="sidebar">
                
                    <li><img src="../css/home.png"><a class="link" href="dashhtml.php?id=<?=$id?>">Home</a></li>
                    <li><img src="../css/adduser.png"><a class="link" href="newUser.php" >Add User</a></li>
                    <li><img src="../css/add.png"><a class="link" href="NewIssuehtml.php">New Issue</a></li>
                    <li><img src="../css/logout.png"><a class="link" href="../php/logout.php">Logout</a></li>
                
            </aside>
            <h1>New User</h1>
            <div id = "form-error"></div><br>
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
        </div>
    </body>
</html>