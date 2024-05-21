<?php
include 'classes.php';

function getAllProducts() {
    return [
        new Product(1, 'Ban Motor', 'Roda', 500000, 'images/ban_motor.jpg'),
        new Product(2, 'Rem Cakram', 'Rem', 300000, 'images/rem_cakram.jpg'),
        new Product(3, 'Lampu LED', 'Lampu', 200000, 'images/lampu_led.jpg'),
        new Product(4, 'Knalpot Racing', 'Knalpot', 1350000, 'images/knalpot_racing.jpg'),
        new Product(5, 'Oli Mesin', 'Oli', 100000, 'images/oli_mesin.jpg'),
        new Product(6, 'Spion', 'Aksesoris', 150000, 'images/spion2.jpg'),
        new product(7, 'Paket Master Rem', 'Rem', 1850000, 'images/master_rem2.jpg'),
        new product(8, 'Paket Kirian', 'Performa', 1200000,'images/kirian.jpg'),
        new product(9, 'Shockbreaker', 'Suspensi', 1500000,'images/shock.jpg')
    ];
}

function getProductById($id) {
    $products = getAllProducts();
    foreach ($products as $product) {
        if ($product->id == $id) {
            return $product;
        }
    }
    return null;
}

function getProductsInCart() {
    if (isset($_COOKIE['cart'])) {
        $cart = json_decode($_COOKIE['cart'], true);
        if (is_array($cart)) {
            $products = getAllProducts();
            $cartProducts = [];

            foreach ($cart as $cartItem) {
                foreach ($products as $product) {
                    if ($product->id == $cartItem['id']) {
                        $cartItem['product'] = $product;
                        $cartItem['quantity'] = $cartItem['quantity'] ?? 1;
                        $cartProducts[] = $cartItem;
                        break;
                    }
                }
            }
            return $cartProducts;
        }
    }
    return [];
}
?>