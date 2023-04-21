<?php
require_once 'index.php';
require_once 'db.php';
interface ProductFactory{
    public function createProduct($sku, $name, $price, $params);
}
