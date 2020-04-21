<?php
include "crud.php";


class User implements crud{
    private $user_id;
    private $first_name;
    private $last_name;
    private $city_name;

//class constructor initialized our variable so they  can be instanciated from anywhere
    function __construct($first_name, $last_name,$city_name){
        $this->first_name=$first_name;
        $this->last_name=$last_name;
        $this->city_name=$city_name;

    }


    //user id setter
    public function setUserId($user_id){
        $this->user_id = $user_id;
    }
    //user id getter
    public function getUserId(){
        return $this->$user_id;
    }

    /*since we're implementing crud interface, we have to define all the methods 
    or else we will run into an error
    for functions that we dont implement we return null

    */

    public function save(){
            $con = new DBConnector();
            $fn = $this->first_name;
            $ln = $this->last_name;
            $city = $this->city_name;
            $res = mysqli_query($con->conn,"INSERT INTO user(first_name, last_name,user_city)VALUES('$fn','$ln','$city')");    
            return $res;
            $con->closeDatabase();
        }



    public function readAll(){
        $con = new DBConnector();
        $array = array();
        $query = 'SELECT * FROM user';
        $res = mysqli_query($con->conn, $query);
        // while($row = mysqli_fetch_assoc($res)){
        //             $array[] = $row;

        // }
        // return $array;
        return $res;
    }
    public function readUnique(){
        return null;
    }
    public function search(){
        return null;
    }
    public function removeAll(){
        return null;
    }
    public function update(){
        return null;
    }
    public function removeOne(){
        return null;
    }

}
?>