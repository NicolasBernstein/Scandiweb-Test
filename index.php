<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Credentials: true");       
abstract class Product {
    private $data = [];
    public function __construct($sku = null, $name = null, $price = null, $productype = null, $attribute = null, $attributetype = null, $format = null){
        
        $this->data['sku'] = $sku;
        $this->data['name'] = $name;
        $this->data['price'] = $price;
        $this->data['productype'] = $productype;
        $this->data['attribute'] = $attribute;
        $this->data['attributetype'] = $attributetype;
        $this->data['format'] = $format;
    }

    public function __get($name){
        if(array_key_exists($name, $this->data)){
          return $this->data[$name];
        }
        }
        public function __set($name, $value){
            $this->data[$name] = $value;
                  }
}
if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["type"] === "POST"){
require_once 'product.php';


$product = new ProductDb();
$sku = $_POST["sku"];
$product = $product->getproductsku($sku);
if($product === null){
    http_response_code(404);
    echo "There's already a product with that SKU, please change it.";

}else{
echo "not found sku, proceed with product creation";
$product = new ProductDb();
$product->sku = $sku;
$product->name = $_POST["name"];
$product->price = $_POST["price"];
$product->productype = $_POST["productype"];
$product->attribute = $_POST["attribute"];
$product->attributetype = $_POST["attributetype"];
$product->format = $_POST["format"];
$product->Create();
}
}

if($_SERVER['REQUEST_METHOD'] === "GET"){
    require_once 'product.php';
    $productDb = new ProductDb();
    $products = $productDb->getallproducts();
    header('Content-Type: application/json');
    echo json_encode($products);
}

if($_SERVER['REQUEST_METHOD'] === "POST" && $_POST["type"] === "delete"){
  require_once 'product.php';
    $sku = $_POST["sku"];
    $product = new ProductDb();
    $product->delete($sku);

}