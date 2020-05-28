<?php
include "crud.php";
include "authenticate.php";
include_once 'DBConnector.php';

class User implements crud,Authenticator{
    private $user_id;
    private $first_name;
    private $last_name;
    private $city_name;
    private $username;
    private $password;
    private $UTC_timestamp;
    private $offset;

//class constructor initialized our variable so they  can be instanciated from anywhere
    function __construct($first_name, $last_name,$city_name,$username,$password){
        $this->first_name=$first_name;
        $this->last_name=$last_name;
        $this->city_name=$city_name;
        $this->username=$username;
        $this->password =$password;
  

    }

       //user id setter
       public function setUTC_timestamp($UTC_timestamp){
        $this->UTC_timestamp = $UTC_timestamp;
    }
    //user id getter
    public function getUTC_timestamp(){
        return $this->$UTC_timestamp;
    }

        //user id setter
        public function setOffset($offset){
            $this->offset = $offset;
        }
        //user id getter
        public function getOffset(){
            return $this->$offset;
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

    public function save($target_file){
           $con = new DBConnector;
            $fn = $this->first_name;
            $ln = $this->last_name;
            $city = $this->city_name;
            $uname = $this->username;
            
            $offset = $this->offset;
            $UTC_timestamp = $this->UTC_timestamp;
            $this->hashPassword();
            $pass=$this->password;
            $res = mysqli_query($con->conn,"INSERT INTO users(first_name, last_name,user_city,username,password,image,created_time,offset)VALUES('$fn','$ln','$city','$uname','$pass','$target_file','$UTC_timestamp','$offset')") or die("Error " .mysqli_error($con->conn));    
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
    public static function create(){
        $instance = new self();
        return $instance;
    }
    //usernmame setter
    public function setUsername ($username){
        $this->username = $username;

    }
    //username getter
    public function getUsername(){
        return $this->username;
    }
    public function setPassword($password){
        $this->password=$password;
    }
    public function getPassword(){
        return $this->password;
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

    public function validateForm(){
        //return true if all the values are not empty
        $fn = $this->first_name;
        $ln = $this->last_name;
        $city = $this->city_name;

        if($fn == "" || $ln == "" || $city==""){
            return false;
        }
        return true;
    }

    public function createFormErrorSession(){
        session_start();
        $_SESSION['form_errors'] = "All fields are required";
    }

        public function hashPassword(){
            $this->password = password_hash($this->password,PASSWORD_DEFAULT);
            
        }

        public function isPasswordCorrect($username,$password){
            $con = new DBConnector;
            $found = false;
            $res = mysqli_query($con->conn,'SELECT * FROM user') or die("Error" .mysqli_error($con->conn));
       
       while($row = $res->fetch_assoc()){
           if(password_verify($password,$row['password'] && $username == $row['username'])){
               $found=true;
           }
       }

       //close the database connection 
       $con ->closeDatabase();
       return found;
       //return true;
        }

        public function login(){
            if($this->isPasswordCorrect()){
                //password is correct so we load the protected page
                header("Location:private_page.php");
            }
        }

        public  function createUserSession($username){
            session_start();
            $_SESSION['username'] = $username;

        }
        public function logout(){
            session_start();
            unset($_SESSION['username']);
            session_destroy();
            header("Location:lab1.php");
        }
}
?>