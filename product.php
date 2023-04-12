<?php
require_once 'index.php';

class ProductDb extends Product{
    
public function Create(){
    require_once 'db.php';
    echo $this->sku . "<br>";
    echo $this->name . "<br>";
    echo $this->price . "<br>";
    echo $this->productype . "<br>";
    echo $this->attribute . "<br>";
    $con = new dbConnect();
    $con->connect();
    $pre = mysqli_prepare($con->con, "INSERT INTO product(sku, name, price, productype, attribute) VALUES (?,?,?,?,?)");
    $pre->bind_param("sssss", $this->sku, $this->name, $this->price, $this->productype, $this->attribute);
    $pre->execute();
    
}

}