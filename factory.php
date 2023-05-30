<?php
require_once 'index.php';
require_once 'repository.php';
interface Factory
{
    public function CreateProduct(array $data, $db, $repository);
}
$repository = new Repository();

class DVDFactory implements Factory
{
    public function CreateProduct(array $data, $db, $repository)
    {
        $product = new DVD($data['sku'], $data['name'], $data['price'], $data['type'], $data['size']);
        $repository->Addindb($db, $product->getsku(), $product->getname(), $product->getprice(), $product->getype(), $product->getsize(), null, null, null, null);
        return $product;
    }
}

class BookFactory implements Factory
{
    public function CreateProduct(array $data, $db, $repository)
    {
        $product = new Book($data['sku'], $data['name'], $data['price'], $data['type'], $data["weight"]);
        $repository->Addindb($db, $product->getsku(), $product->getname(), $product->getprice(), $product->getype(), null, $product->getweight(), null, null, null);
        return $product;
    }
}
class FurnitureFactory implements Factory
{
    public function CreateProduct(array $data, $db, $repository)
    {
        $product = new Furniture($data['sku'], $data['name'], $data['price'], $data['type'], $data['height'], $data['width'], $data['length']);
        $repository->Addindb($db, $product->getsku(), $product->getname(), $product->getprice(), $product->getype(), null, null, $product->getheight(), $product->getwidth(), $product->getlength());
        return $product;
    }
}
