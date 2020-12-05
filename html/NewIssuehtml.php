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
    <header>
        <h1>BugMe Issue Tracker</h1>
        <h2>Logged In by User: <?= $_SESSION['email']?></h2>
    </header>
    <main>
            <aside id="sidebar">
                <ul>
                    <li><a class="link" href="dashhtml.php">Home</a></li>
                    <li><a class="link" href="newUser.php">Add User</a></li>
                    <li><a class="link" href="NewIssuehtml.php">New Issue</a></li>
                    <li><a class="link" href="">Logout</a></li>
                </ul>
            </aside>
            <h1>Create Issue</h1>
                <form>
                    <div class="form">
                        <label for="title">Title</label></br>
                        <input id="title" type="text" name="title"/></br></br>
                        <label for="desc">Description</label></br>
                        <input id="desc" type="textarea" name="desc" rows="50" cols="50"/></br></br>
                        <label for="assign">Assigned To</label></br>
                        <select id="select" class ="select"></select></br></br> 
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
                        </div>
                </form>
            <div id = "form-error"></div>
    </main>
</body>
</html>
