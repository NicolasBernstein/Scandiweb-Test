<?php
require_once 'index.php';


class Book extends Product {
    private $weight;

    public function __construct($sku, $name, $price, $weight) {
        parent::__construct($sku, $name, $price, $weight);
        return $this->params = ["weight" => $weight];

    }
}

class DVD extends Product {
    private $size;

    public function __construct($sku, $name, $price, $size) {
        parent::__construct($sku, $name, $price, $size);
        return $this->params = ["size" => $size];
    }
}
class Furniture extends Product {
    private $height;
    private $width;
    private $length;

    public function __construct($sku, $name, $price, $height, $width, $length) {
        parent::__construct($sku, $name, $price, $height, $width, $length);
        return $this->params = ["height" => $height, "width" => $width, "length" => $length];
    }
}

        /*$this->height = $height;
        $this->width = $width;
        $this->length = $length;*/
/*
class ProductDb extends Product{


public function Create(){   
    require_once 'db.php';
    $con = new dbConnect();
    $con->connect();
    $pre = mysqli_prepare($con->con, "INSERT INTO product(sku, name, price, productype, attribute, attributetype, format) VALUES (?,?,?,?,?,?,?)");
    $pre->bind_param("sssssss", $this->sku, $this->name, $this->price, $this->productype, $this->attribute, $this->attributetype, $this->format);
    $pre->execute();
    
}

public function getproductsku($sku){
    require_once 'db.php';
    $con = new dbConnect();
    $con->connect();
    $pre = mysqli_prepare($con->con, "SELECT * FROM product WHERE sku = ?");
    $pre->bind_param("s", $sku);
    $pre->execute();
    $result = $pre->get_result();
    if($result->num_rows === 0){
        return true;
    }else{
        return null; 
    }
    }

    public function getallproducts(){
        require_once 'db.php';
        $con = new dbConnect();
        $con->connect();
        $pre = mysqli_prepare($con->con, "SELECT * FROM product");
        $pre->execute();
        $result = $pre->get_result();
        $products = [];
        while($row = $result->fetch_assoc()){
      $products[] = $row;
        }
        return $products;   
    }

    public function delete($sku){
        require_once 'db.php';
        $con = new dbConnect();
        $con->connect();
        $pre = mysqli_prepare($con->con, "DELETE FROM product WHERE sku = ?");
        $pre->bind_param("s", $sku);
        $pre->execute();
        if ($pre->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
        }

}*/