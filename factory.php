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
        $product = new DVD($data['sku'], $data['nombre'], $data['precio'], $data['type'], $data['size'], $data["weight"], $data['height'], $data['width'], $data['length']);
        $jsonData = json_encode($product);
        $product->Addindb($product);
        echo $jsonData;
        return $product;
        // $jsonData = json_encode($product);

    }
}

class BookFactory implements Factory
{
    public function CreateProduct(array $data)
    {
        echo "hi";
        $product = new DVD($data['sku'], $data['nombre'], $data['precio'], $data['type'], $data['size'], $data["weight"], $data['height'], $data['width'], $data['length']);
        $jsonData = json_encode($product);
        $product->Addindb($product);
        echo $jsonData;
        return $product;
    }
}
class FurnitureFactory implements Factory
{
    public function CreateProduct(array $data)
    {
        echo "hi";
        $product = new DVD($data['sku'], $data['nombre'], $data['precio'], $data['type'], $data['size'], $data["weight"], $data['height'], $data['width'], $data['length']);
        $jsonData = json_encode($product);
        $product->Addindb($product);
        echo $jsonData;
        return $product;
    }
}
