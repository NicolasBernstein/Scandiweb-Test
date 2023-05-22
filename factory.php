<?php
require_once 'index.php';
interface Factory
{
    public function CreateProduct(array $data);
}

class DVDFactory implements Factory
{
    public function CreateProduct(array $data)
    {
        echo "hi";
        $product = new DVD($data['sku'], $data['name'], $data['price'], $data['type'], $data['size'], $data["weight"], $data['height'], $data['width'], $data['length']);
        $product->Addindb($product);
        return $product;
    }
}

class BookFactory implements Factory
{
    public function CreateProduct(array $data)
    {
        echo "hi";
        $product = new DVD($data['sku'], $data['name'], $data['price'], $data['type'], $data['size'], $data["weight"], $data['height'], $data['width'], $data['length']);
        $product->Addindb($product);
        return $product;
    }
}
class FurnitureFactory implements Factory
{
    public function CreateProduct(array $data)
    {
        echo "hi";
        $product = new DVD($data['sku'], $data['name'], $data['price'], $data['type'], $data['size'], $data["weight"], $data['height'], $data['width'], $data['length']);
        $product->Addindb($product);
        return $product;
    }
}
