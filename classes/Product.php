<?php


namespace classes;
include 'classes/Config.php';


class Product extends Config
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllProducts(){
        $query = "SELECT * FROM products";
        $result = $this->mysqli->query($query);

        $array = [];
        while ($rows = $result->fetch_assoc()) {
            $array[] = $rows;
        }
        return $array;
    }

    public function getProduct($id){
        $query = "SELECT * FROM products where id = ".$id;
        $result = $this->mysqli->query($query);

        return $result->fetch_assoc();
    }

    public function addProduct($title,$price,$des){
        $title = $this->mysqli->real_escape_string($title);
        $price = $this->mysqli->real_escape_string($price);
        $des = $this->mysqli->real_escape_string($des);

        $query = "INSERT INTO products (title, price, des)   
                                VALUES ('$title', '$price', '$des')";

        $result = $this->mysqli->query($query);

        return $result;

    }
    public function editProduct($id,$title,$price,$des){
        $id = $this->mysqli->real_escape_string($id);
        $title = $this->mysqli->real_escape_string($title);
        $price = $this->mysqli->real_escape_string($price);
        $des = $this->mysqli->real_escape_string($des);

        $query = "UPDATE products SET title = '$title' , price = '$price' , des = '$des' where id = ".$id;

        $result = $this->mysqli->query($query);

        return $result;

    }
    public function deleteProduct($id){


        $query = "DELETE FROM products where id = ".$id;

        $result = $this->mysqli->query($query);

        return $result;

    }

}