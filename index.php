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

public function __get($name){
        if(array_key_exists($name, $this->data)){
          return $this->data[$name];
        }
        }
public function __set($name, $value){
            $this->data[$name] = $value;
                  }

                  public static function createProduct($sku, $name, $price, $params) {
                      $product = new static($sku, $name, $price, ...$params);
                      $product->create();
                      return $product;
                  }
                  
}
require_once 'product.php';
$bookFactory = new BookFactory();
$book = $bookFactory->createProduct('fsafdas-fdsadf-afsdds','Book','10.99', ['weight' => '1kg']);
