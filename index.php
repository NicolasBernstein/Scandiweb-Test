<?php
require_once 'db.php';
require_once 'factory.php';
const FACTORIES = [
    'DVD' => new DVDFactory(),
    'BOOK' => new BookFactory(),
    'FURNITURE' => new FurnitureFactory()
];
abstract class Product
{
    // basic
    public $sku;
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


    public static function loadFrontendProductData(array $data): Product
    {
        $type = $data["type"];
        $fact = FACTORIES[$type];
        return $fact->CreateProduct($data);
    }

    public static function getallproducts(): array
    {
        $con = new dbConnect();
        $con->connect();
        $pre = mysqli_prepare($con->con, "SELECT * FROM products");
        $pre->execute();
        $result = $pre->get_result();
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        return $products;
    }

    public static function getproductsku($sku)
    {
        $con = new dbConnect();
        $con->connect();
        $pre = mysqli_prepare($con->con, "SELECT * FROM products WHERE sku = ?");
        $pre->bind_param("s", $sku);
        $pre->execute();
        $result = $pre->get_result();
        if ($result->num_rows === 0) {
            return 'false';
        } else {
            return 'true';
        }
    }

    public static function delete($sku)
    {
    }

    public function Addindb()
    {
        echo "ADDED IN DATABASE";
        $con = new dbConnect();
        $con->connect();
        $pre = mysqli_prepare($con->con, "INSERT INTO products(sku, name, price, type, size, weight, height, width, length) VALUES (?,?,?,?,?,?,?,?,?)");
        $pre->bind_param("sssssssss", $this->sku, $this->name, $this->price, $this->type, $this->size, $this->weight, $this->height, $this->width, $this->length);
        $pre->execute();
        echo  $this->sku;
        echo $this->type;
        echo $this->size;
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
/*
DVD
$data = [
    'sku' => 'dasdasdsa',
    'type' => 'DVD',
    'nombre' => 'Producto A',
    'precio' => 12.99,
    'size' => 10

];*/
/*
DVD
$data = [
    'sku' => 'dasdasdsa',
    'type' => 'DVD',
    'nombre' => 'Producto A',
    'precio' => 12.99,
    'size' => 10

];*/


//BOOK
/*
$data = [
    'sku' => 'dasdasdsa',
    'type' => 'BOOK',
    'nombre' => 'Producto A',
    'precio' => 12.99,
    'weight' => '1 kg'

];



$product = Product::loadFrontendProductData($data);
*/
$getsku = Product::getproductsku('dasdasdsa');
//echo $getsku;
if ($getsku == 'true') {
    echo 'it is true';
} else {
    echo 'it is false';
}
//$products = Product::getallproducts();
//echo json_encode($products);
