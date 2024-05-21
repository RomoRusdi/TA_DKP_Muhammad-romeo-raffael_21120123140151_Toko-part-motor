<?php
include 'functions.php';
$products = getAllProducts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Toko Online Part Motor - Rusdi Partz</title>
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
        <h1 class="text-center">Toko Online Part Motor</h1>
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="<?php echo $product->image; ?>" class="card-img-top" alt="<?php echo $product->name; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product->name; ?></h5>
                            <p class="card-text">Kategori: <?php echo $product->category; ?></p>
                            <p class="card-text">Harga: Rp <?php echo number_format($product->price, 2); ?></p>
                            <a href="product.php?id=<?php echo $product->id; ?>" class="btn btn-primary">Detail</a>
                            <button class="btn btn-success add-to-cart" data-product-id="<?php echo $product->id; ?>">Tambah ke Keranjang</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>