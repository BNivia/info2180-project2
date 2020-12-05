<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/newuser.css">
    <script type= "text/javascript" src="../js/newIssue.js"></script>
    <title>BugMe Issue Tracker</title>
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
        <div class="side">
            <aside>
                
                    <li><img src="../css/home.png"><a class="link" href="dashhtml.php">Home</a></li>
                    <?php if ($_SESSION['email'] == 'admin@project2.com'):?>
                        <li><img src="../css/adduser.png"><a class="link" href="newUser.php">Add User</a></li>
                    <?php endif; ?>
                    <li><img src="../css/add.png"><a class="link" href="NewIssuehtml.php">New Issue</a></li>
                    <li><img src="../css/logout.png"><a class="link" href="">Logout</a></li>
                
            </aside>
        </div>
        <h1>Create Issue</h1>
        <div class="issue-form">
            <form>
                <label for="title">Title</label>
                <input id="title" type="text" name="title"/></br>
                <label for="desc">Description</label></br>
                <input id="desc" type="textarea" name="desc" rows="50" cols="50"/></br>
                <label for="assign">Assigned To</label></br>
                <select id="select" class ="select"></select></br>
                <label for="type">Type</label></br>
                <select name="type" id="type">
                    <option value="Bug">Bug</option>
                    <option value="Proposal">Proposal</option>
                    <option value="Task">Task</option>
                </select></br></br>
                <label for="priority">Priority</label></br>
                <select name="priority" id="priority">
                    <option value="Minor">Minor</option>
                    <option value="Major">Major</option>
                    <option value="Critical">Critical</option>
                </select></br></br>
                <button type="submit" id="newissue-btn">Submit</button>
            </form>
        </div>
        <div id = "form-error"></div>
    </body>
</html>
