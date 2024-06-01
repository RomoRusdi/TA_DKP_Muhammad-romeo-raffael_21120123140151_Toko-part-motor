<?php
include 'classes.php';

function getAllProducts() {
    return [
        new Product(1, 'Ban Motor', 'Roda', 'Ban yang berukuran ring 14', 500000, 'images/ban_motor.jpg'),
        new Product(2, 'Rem Cakram', 'Rem', 'Rem cakram yang tahan lama', 300000, 'images/rem_cakram.jpg'),
        new Product(3, 'Lampu LED', 'Lampu','Lampu LED strip untuk Lampu alis', 200000, 'images/lampu_led.jpg'),
        new Product(4, 'Knalpot Racing', 'Knalpot', 'Knalpot Racing yang suaranya nyaman di dengar manusia', 1350000, 'images/knalpot_racing.jpg'),
        new Product(5, 'Oli Mesin', 'Oli', 'Oli yang di gadang-gadang tahan lama', 100000, 'images/oli_mesin.jpg'),
        new Product(6, 'Spion', 'Aksesoris','Spion yang berkualitas top', 150000, 'images/spion2.jpg'),
        new product(7, 'Paket Master Rem', 'Rem', 'Master rem yang tidak kaleng-kaleng', 1850000, 'images/master_rem2.jpg'),
        new product(8, 'Paket Kirian', 'Performa', 'Membuat tarikan motor matic anda menjadi joss', 1200000,'images/kirian.jpg'),
        new product(9, 'Shockbreaker', 'Suspensi', 'Shockbreaker yang membuat nyaman saat berkedara', 1500000,'images/shock.jpg')
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