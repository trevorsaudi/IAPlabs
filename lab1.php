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
        echo "Save operation was successful";

    }else{
        echo "An error occured";
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <table align="center">
            <tr>
                <td><input type="text" name="first_name" required placeholder="First Name" /></td>
            </tr>
            <tr>
                <td><input type="text" name="last_name" required placeholder="Last Name" /></td>
            </tr>
            <tr>
                <td><input type="text" name="city_name" required placeholder="City" /></td>
            </tr>
            <tr>
                <td><button type="submit" name="btn-save" required placeholder="Submit" >Submit</td>
            </tr>

        </table>
    </form>




    
</body>
</html>

