<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Credentials: true");   
require_once 'factory.php';   
require_once 'db.php';
abstract class Product implements ProductFactory {
    private $data = [];
    public function __construct($sku = null, $name = null, $price = null, $productype = null){
        
        $this->data['sku'] = $sku;
        $this->data['name'] = $name;
        $this->data['price'] = $price;
        $this->data['productype'] = $productype;
    }
    public function createProduct($sku, $name, $price, $params) {

    }

    

public function __get($name){
        if(array_key_exists($name, $this->data)){
          return $this->data[$name];
        }
        }
public function __set($name, $value){
            $this->data[$name] = $value;
                  }
   
         
                  
}
require_once 'product.php';

$book = new Book("asdsadsa-dsadsad", "Arthas, el rey exanime", "30.00", "1");
echo $book->params["weight"];

$book = new DVD("asdsadsa-dsadsad", "Arthas, el rey exanime", "30.00", "5");
echo $book->params["size"];


$book = new Furniture("asdsadsa-dsadsad", "Arthas, el rey exanime", "30.00", "5", "7", "9");
echo $book->params["height"];
echo $book->params["width"];
echo $book->params["length"];