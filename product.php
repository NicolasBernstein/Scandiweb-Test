<?php
require_once 'index.php';


class Book extends Product {
    private $weight;

    public function __construct($sku, $name, $price, $weight) {
        parent::__construct($sku, $name, $price, $weight);
        return $this->params = ["weight" => $weight];

    }
}

class DVD extends Product {
    private $size;

    public function __construct($sku, $name, $price, $size) {
        parent::__construct($sku, $name, $price, $size);
        return $this->params = ["size" => $size];
    }
}
class Furniture extends Product {
    private $height;
    private $width;
    private $length;

    public function __construct($sku, $name, $price, $height, $width, $length) {
        parent::__construct($sku, $name, $price, $height, $width, $length);
        return $this->params = ["height" => $height, "width" => $width, "length" => $length];
    }
}
