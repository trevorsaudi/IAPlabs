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
    <script src="apikey.js"></script>
    <link rel="stylesheet" href="validate.css">

    <!-- bootstrap file -->
    <!-- js -->
    <script type = "text/javascript" src="bootstrap/js.bootstrap.js"></script>
    <script type = "text/javascript" src="bootstrap/js.bootstrap.min.js"></script>


<!-- css -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css.map">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css.map">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css.map">
</head>
<body>
 <!-- <p>this is a private page</p>
 <p>we want to protect it</p> -->

 <p><a href="logout.php">Logout</a></p>
<hr>
<h3>Here, we will create an API that will allow Users/Developer to order items from external systems</h3>
<hr>
<h4>We now put this feature of allowing users to generate an API key. Click the button to generate the API key</h4>

<button class="btn btn-primary" id="api-key-btn">Generate API key</button> <br><br>
<!-- This text area will hold the api key -->
<strong>Your API key:</strong>(Note that if your API key is already in use by already running applications,
generating a new key will stop the application from functioning ) <br>
<textarea name="api_key" id="api_key" cols="100" rows="2" readonly><?php echo fetchUserApiKey(); ?></textarea>


<h3>Service description:</h3>
We have a service/API that allows external applications to order food and also 
pull order status by using order id. Let's do it
<hr>
</body>
</html>