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
    <title>Detail Produk - Rusdi Partz</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="bg-primary text-white">
        <div class="container">
            <h1 class="display-4">Rusdi Partz</h1>
            <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="cart.php">Keranjang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="contact.php">Kontak</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo $product->image; ?>" class="img-fluid" alt="<?php echo $product->name; ?>">
            </div>
            <div class="col-md-6">
                <h2><?php echo $product->name; ?></h2>
                <p class="text-muted">Kategori: <?php echo $product->category; ?></p>
                <h4 class="text-primary">Rp <?php echo number_format($product->price, 2); ?></h4>
                <p><?php echo $product->detail;  ?></p>
                <button class="btn btn-success add-to-cart" data-product-id="<?php echo $product->id; ?>">Tambah ke Keranjang</button>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>