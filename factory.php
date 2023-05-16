<?php
interface Factory
{
    public function CreateProduct(array $data);
}

class DVDFactory implements Factory
{
    public function CreateProduct(array $data)
    {
    }
}

class BookFactory implements Factory
{
    public function CreateProduct(array $data)
    {
    }
}
class FurnitureFactory implements Factory
{
    public function CreateProduct(array $data)
    {
    }
}
