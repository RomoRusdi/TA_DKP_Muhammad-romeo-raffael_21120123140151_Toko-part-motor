<?php
class Product {
    public $id;
    public $name;
    public $category;
    public $detail;
    public $price;
    public $image;

    function __construct($id, $name, $category, $detail, $price, $image) {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->detail = $detail;
        $this->price = $price;
        $this->image = $image;
    }
}
?>