<?php

namespace classes;
include 'classes/Config.php';

class User extends Config
{

//    private $name;
//    private $surname;

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllUser()
    {
        $query = "SELECT * FROM products";
        $result = $this->mysqli->query($query);

        $array = [];
        while ($rows = $result->fetch_assoc()) {
            $array[] = $rows;
        }
        return $array;

    }

    public function getUser($id)
    {
        $query = "SELECT * FROM ";
        $result = $this->mysqli->query($query);
    }

    //get user by email and password
    public function loginUser($email,$password)
    {
        //security escape string
        $email = $this->mysqli->real_escape_string($email);
        $password = $this->mysqli->real_escape_string($password);

        $query = "SELECT * FROM users where email = '$email' and password = '$password'";
        $result = $this->mysqli->query($query);
        //security if only one result
        if($result->num_rows == 1 ){
            //login success
            return $result->fetch_assoc();
        }
        return false;
    }

    public function updateUser($array)
    {

    }

    public function deleteUser($id)
    {

    }

    public function addUser($id)
    {

    }
}