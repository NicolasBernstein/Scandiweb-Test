<?php
class dbConnect{
public $con; 
private $server = 'localhost';
private $dbname = 'productdb';
private $user = 'root';
private $pass = '';
public function connect(){
    $this->con = mysqli_connect($this->server, $this->user, $this->pass, $this->dbname);
}

}