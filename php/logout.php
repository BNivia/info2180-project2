<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type= "text/javascript" src="../js/logout.js"></script>
</head>
</html>

<?php 
session_start();
session_destroy();
?>