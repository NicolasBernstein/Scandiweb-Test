<?php
class Repository
{
    public function getallproducts($con): array
    {
        $pre = mysqli_prepare($con->con, "SELECT * FROM products");
        $pre->execute();
        $result = $pre->get_result();
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        return $products;
    }

    public function getproductsku($sku, $con)
    {
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

    public function delete($sku, $con)
    {
        require_once 'db.php';
        $pre = mysqli_prepare($con->con, "DELETE FROM products WHERE sku = ?");
        $pre->bind_param("s", $sku);
        $pre->execute();
        if ($pre->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function Addindb($con, $sku, $name, $price, $type, $size, $weight, $height, $width, $length)
    {
        echo "ADDED IN DATABASE";
        $pre = mysqli_prepare($con->con, "INSERT INTO products(sku, name, price, type, size, weight, height, width, length) VALUES (?,?,?,?,?,?,?,?,?)");
        $pre->bind_param("sssssssss", $sku, $name, $price, $type, $size, $weight, $height, $width, $length);
        $pre->execute();
    }
}
