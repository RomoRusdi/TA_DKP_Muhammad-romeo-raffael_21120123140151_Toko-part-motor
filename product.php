<?php
include 'functions.php';
if (isset($_GET['id'])) {
    $product = getProductById($_GET['id']);
    if (!$product) {
        die("Produk tidak ditemukan.");
    }
} else {
    die("ID produk tidak disediakan.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $product->name; ?> - Toko Online Part Motor</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1><?php echo $product->name; ?></h1>
    <img src="<?php echo $product->image; ?>" alt="<?php echo $product->name; ?>">
    <p>Kategori: <?php echo $product->category; ?></p>
    <p>Harga: Rp <?php echo number_format($product->price, 2); ?></p>
    <a href="index.php">Kembali ke Daftar Produk</a>
</body>
</html>