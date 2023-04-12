<?php

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
require_once 'product.php';
$product = new ProductDb();
$product->sku = 'test234523432';
$product->name = 'nametest';
$product->price = '3';
$product->productype = 'disc';
$product->attribute = '1MB';
$product->Create();