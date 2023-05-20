<?php
class dbConnect
{
    public $con;
    /*
private $server = 'sql111.epizy.com';
private $dbname = 'epiz_34024334_products';
private $user = 'epiz_34024334';
private $pass = '5NhZU9PpBaRQT';
*/
    private $server = 'localhost';
    private $dbname = 'productsdb';
    private $user = 'root';
    private $pass = '';
    public function connect()
    {
        $this->con = mysqli_connect($this->server, $this->user, $this->pass, $this->dbname);
    }
}
