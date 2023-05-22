<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Credentials: true");
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
        require_once 'db.php';
        $con = new dbConnect();
        $con->connect();
        $pre = mysqli_prepare($con->con, "DELETE FROM products WHERE sku = ?");
        $pre->bind_param("s", $sku);
        $pre->execute();
        if ($pre->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function Addindb()
    {
        echo "ADDED IN DATABASE";
        $con = new dbConnect();
        $con->connect();
        $pre = mysqli_prepare($con->con, "INSERT INTO products(sku, name, price, type, size, weight, height, width, length) VALUES (?,?,?,?,?,?,?,?,?)");
        $pre->bind_param("sssssssss", $this->sku, $this->name, $this->price, $this->type, $this->size, $this->weight, $this->height, $this->width, $this->length);
        $pre->execute();
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
    $getsku = Product::getproductsku($data['sku']);
    if ($getsku === 'true') {
        return;
    }
    $product = Product::loadFrontendProductData($data);
}
if ($_SERVER['REQUEST_METHOD'] === "POST" && $_POST['datatype'] === "delete") {
    $delete = Product::delete($_POST['sku']);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $products = Product::getallproducts();
    echo json_encode($products);
}
