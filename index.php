<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Credentials: true");
require_once 'db.php';
require_once 'factory.php';
require_once 'repository.php';
const FACTORIES = [
    'DVD' => new DVDFactory(),
    'BOOK' => new BookFactory(),
    'FURNITURE' => new FurnitureFactory()
];
abstract class Product
{
    protected $sku;
    protected $name;
    protected $price;
    protected $type;

    public function __construct($sku, $name, $price, $type)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->type = $type;
    }


    public static function SaveinDb(array $data, $db, $repository): Product
    {
        $type = $data["type"];
        $fact = FACTORIES[$type];
        return $fact->CreateProduct($data, $db, $repository);
    }



    public function getsku()
    {
        return $this->sku;
    }
    public function getname()
    {
        return $this->name;
    }
    public function getprice()
    {
        return $this->price;
    }
    public function getype()
    {
        return $this->type;
    }
}


class DVD extends Product
{
    protected $size;

    public function __construct($sku, $name, $price, $type, $size)
    {
        parent::__construct($sku, $name, $price, $type, $size);
        $this->size = $size;
    }
    public function getsize()
    {
        return $this->size;
    }
}

class Book extends Product
{
    protected $weight;

    public function __construct($sku, $name, $price, $type, $weight)
    {
        parent::__construct($sku, $name, $price, $type, $weight);
        $this->weight = $weight;
    }

    public function getweight()
    {
        return $this->weight;
    }
}

class Furniture extends Product
{
    protected $height;
    protected $width;
    protected $length;

    public function __construct($sku, $name, $price, $type, $height, $width, $length)
    {
        parent::__construct($sku, $name, $price, $type, $height, $width, $length);
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }
    public function getheight()
    {
        return $this->height;
    }
    public function getwidth()
    {
        return $this->width;
    }
    public function getlength()
    {
        return $this->length;
    }
}

$db = new dbConnect();
$db->connect();
$repository = new Repository();

if ($_SERVER['REQUEST_METHOD'] === "POST" && $_POST['datatype'] === 'POST') {
    $data = [
        'sku' => $_POST['sku'],
        'type' => $_POST['type'],
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'size' => $_POST['size'],
        'weight' => $_POST['Weight'],
        'height' => $_POST['Height'],
        'width' => $_POST['Width'],
        'length' => $_POST['Length']
    ];
    $getsku = $repository->getproductsku($data['sku'], $db);
    if ($getsku === 'true') {
        http_response_code(404);
        echo "There's already a product with that SKU, please change it.";
        return;
    }
    $product = Product::SaveinDb($data, $db, $repository);
}
if ($_SERVER['REQUEST_METHOD'] === "POST" && $_POST['datatype'] === "delete") {
    $delete = $repository->delete($_POST['sku'], $db);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $products = $repository->getallproducts($db);
}
$data = [
    'sku' => 'adsadsadsad',
    'type' => 'FURNITURE',
    'name' => 'DVD',
    'price' => '5',
    'height' => '70',
    'width' => '80',
    'length' => '50'


];
