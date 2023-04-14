<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Credentials: true");       
abstract class Product {
    private $data = [];
    public function __construct($sku = null, $name = null, $price = null, $productype = null, $attribute = null){
        
        $this->data['sku'] = $sku;
        $this->data['name'] = $name;
        $this->data['price'] = $price;
        $this->data['productype'] = $productype;
        $this->data['attribute'] = $attribute;
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
if($_SERVER['REQUEST_METHOD'] == "POST"){
require_once 'product.php';
$product = new ProductDb();
$product->sku = $_POST["sku"];
$product->name = $_POST["name"];
$product->price = $_POST["price"];
$product->productype = $_POST["productype"];
$product->attribute = $_POST["attribute"];
$product->Create();

}