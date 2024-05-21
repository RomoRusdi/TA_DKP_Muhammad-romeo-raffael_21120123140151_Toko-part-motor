<?php
class Product {
    public $id;
    public $name;
    public $category;
    public $price;
    public $image;

    function __construct($id, $name, $category, $price, $image) {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
        $this->image = $image;
    }
}
?>