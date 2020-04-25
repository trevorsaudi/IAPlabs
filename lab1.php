
    <!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Labs IAP</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<nav>
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo">trevorsaudi</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="lab1.php">Input Table</a></li>
        <li><a href="display.php">Display Table</a></li>
      </ul>
    </div>
  </nav>
  

  
  <div class="row">
    <form class="col s12" method="post">
     
      <div class="row">
        <div class="input-field col s12">
        <input type="text" name="first_name" required placeholder="First Name" />
          <label for="disabled">First Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
        <input type="text" name="last_name" required placeholder="Last Name" />
          <label for="password">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
        <input type="text" name="city_name" required placeholder="City" />
          <label for="email">City</label>
        </div>
      </div>
   
      
<Button class="waves-effect waves-light btn"  type="submit" name="btn-save" required placeholder="Submit">Add Records</Button>
    </form>
  </div>
        <!-- inputting details to the database -->
<?php
include_once 'DBConnector.php';
include_once 'user.php';
$con = new DBConnector;//Creating the database connection
//code to insert data starts here

if(isset($_POST['btn-save'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $city = $_POST['city_name'];

    // create a user object
    //we create the object using our constructor to initialize our variables further

    $user = new User($first_name, $last_name, $city);
    $res = $user->save();


    //check if operation save occured successfully
    if($res){
  
?>
<script>alert("Success")</script>

<?php
}else{
    ?>
 <script>alert("Error")</script>

  <?php
}


}

?>




<!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script>
  window.addEventListener("load", function () {
  var all = document.querySelectorAll('span.close');
  for (var btn of all) {
    btn.addEventListener("click", function () {
      var bar = this.parentElement;
      bar.parentElement.removeChild(bar);
    });
  }
});
</script>
  </body>
</html>





    
</body>
</html>

