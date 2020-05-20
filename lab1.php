        <!-- inputting details to the database -->
        <?php
include_once 'DBConnector.php';
include_once 'user.php';
include_once 'fileUploader.php';

$con = new DBConnector;//Creating the database connection
//code to insert data starts here

if(isset($_POST['btn-save'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $city = $_POST['city_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // $utc_timestamp = $_POST['utc_timestamp'];
    // $offset = $_POST['time_zone_offset'];


    // create a user object
    //we create the object using our constructor to initialize our variables further

    $user = new User($first_name, $last_name, $city,$username,$password);
    if(!$user->validateForm()){
      $user->createFormErrorSessions();
      header("Refresh:0");
      die();
    }


    $uploader = new fileUploader();
    $uploader->uploadFile();
    $target_file = $uploader->target_file;
  
   
    $res = $user->save($target_file);


    //check if operation save occured successfully
    if($res){
  
?>
        <script>
          alert("Success")
        </script>

        <?php
}else{
    ?>
        <script>
          alert("Error")
        </script>

        <?php
}
}

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
          <title>Labs IAP</title>
          <script type="text/javascript" src="validate.js"></script>
          <!-- CSS  -->
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <script src="https://ajax.googleapis.com/ajax/libs.jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript"src="timezone.js"></script>
          <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
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
          <form name="user_details" id="user_details" enctype="multipart/form-data" method="post" action=<?=$_SERVER['PHP_SELF'] ?> onsubmit="return validateForm()">
  

              <div class="row">
                <div class="input-field col s12">
                  <div id="form-errors">
                    <?php
          session_start();
          if(!empty($_SESSION['form_errors'])){
            echo " " .$_SESSION['form_errors'];
            unset($_SESSION['form_errors']);
          }
       
       ?>
                  </div>
                </div>
              </div>

              <div class="row">

                <div class="input-field col s12">
                  <input type="text" name="first_name" required placeholder="First Name" />
                  <label for="first_name">First Name</label>
                </div>

              </div>


              <div class="row">

                <div class="input-field col s12">
                  <input type="text" name="last_name" required placeholder="Last Name" />
                  <label for="last_name">Last Name</label>
                </div>

              </div>





              <div class="row">
                <div class="input-field col s12">
                  <input type="text" name="city_name" required placeholder="City" />
                  <label for="city_name">City</label>
                </div>
              </div>

              <div class="row">

                <div class="input-field col s12">
                  <input type="text" name="username" required placeholder="Username" />
                  <label for="username">Username</label>
                </div>

              </div>

              <div class="row">
                <div class="input-field col s12">
                  <input type="password" name="password" required placeholder="Password" />
                  <label for="password">Password</label>
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <input type="file" name="fileToUpload" id="fileToUpload" />
                  <label for="fileToUpload">Profile image:</label>
                </div>
              </div>


          </div>


          <button class="waves-effect waves-light btn" type="submit" name="btn-save" required placeholder="Submit">Add
            Records</button>
            <!-- create hidden controls to store client utc date and time zone -->
         

          <a
              href="login.php">Login</a>

          </form>
          </div>



          <!--  Scripts-->
          <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
          <script src="js/materialize.js"></script>
   
    
</body>
        </html>