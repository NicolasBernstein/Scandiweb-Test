<?php
require_once 'db.php';
require_once 'factory.php';
abstract class Product
{
    // basic
    protected $sku;
    protected $name;
    protected $price;
    protected $type;

    // dvd
    protected $size;
    // books
    protected $weight;
    // furniture
    protected $height;
    protected $width;
    protected $length;

    public function __construct($sku, $name, $price, $type, $size, $weight, $height, $width, $length)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->type = $type;
        $this->size = $size;
        $this->weight = $weight;
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
    }
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
}


class DVD extends Product
{
}

class Book extends Product
{
}

class Furniture extends Product
{
}
