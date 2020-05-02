<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location:login.php");
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="validate.js"></script>
    
</head>
<body>
 <p>this is a private page</p>
 <p>we want to protect it</p>
 <p><a href="logout.php">Logout</a></p>
    
</body>
</html>