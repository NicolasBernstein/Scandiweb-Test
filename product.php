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
  //  $con = new DbConnect();
   // $con->connect();
}

}