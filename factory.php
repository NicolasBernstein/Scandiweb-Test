<?php
require_once 'db.php';
interface ProductFactory{
    public static function createProduct($sku, $name, $price, $params);
}

class BookFactory implements ProductFactory {
    public static function createProduct($sku, $name, $price, $params) {
        $weight = $params['weight'];
        
        return new Book($sku, $name, $price, $params);
    }
}

class FurnitureFactory implements ProductFactory {
    public static function createProduct($sku, $name, $price, $params) {
        $length = $params['length'];
        $width = $params['width'];
        $height = $params['height'];
        return new Furniture($sku, $name, $price, $params);
    }
}

class DVDFactory implements ProductFactory {
    public static function createProduct($sku, $name, $price, $params) {
        $size = $params['size'];
        return new DVD($sku, $name, $price, $params);
    }
}

class ProductCreator implements ProductFactory{
    public static function createProduct($sku, $name, $price, $params) {
        $factory = new ProductFactory();
        $product = $factory->createProduct($sku, $name, $price, $params);
        $product->create();
        return $product;
    }
}