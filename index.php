<?php

abstract class Product {
    private $data = [];
    public function __construct($sku, $name, $price, $productype, $attribute){
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
      
}
require_once 'product.php';
$product = new ProductDb("test234523432", "nametest", "3", "disc", "1MB");
$product->Create();