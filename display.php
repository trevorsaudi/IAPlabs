<?php
include_once 'DBConnector.php';
include_once 'user.php';
$con = new DBConnector;
$user = new User('','','');

$res=$user->readAll();
while($row=mysqli_fetch_array($res)){

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <tr>

    <td><?php echo $row["first_name"] ?></td> 
    <td><?php echo $row["last_name"] ?></td> 
    <td><?php echo $row["user_city"] ?></td> <br>
    </tr>
<?php 
}?>


    </body>
    </html>
  