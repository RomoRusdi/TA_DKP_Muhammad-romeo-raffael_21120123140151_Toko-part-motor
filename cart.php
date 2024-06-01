<?php
include 'functions.php';

$cartProducts = getProductsInCart();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja - Rusdi Partz</title>
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
        <h1 class="text-center">Keranjang Belanja</h1>
        <?php if (empty($cartProducts)): ?> 
            <p class="text-center">Keranjang belanja Anda kosong.</p>
        <?php else: ?> 
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?> 
                    <?php foreach ($cartProducts as $item): ?>
                        <?php
                            $subtotal = $item['product']->price * $item['quantity'];
                            $total += $subtotal;
                        ?>
                        <tr>
                            <td><?php echo $item['product']->name; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td>Rp <?php echo number_format($item['product']->price, 2); ?></td>
                            <td>Rp <?php echo number_format($subtotal, 2); ?></td>
                            <td>
                                <button class="btn btn-danger remove-from-cart" data-product-id="<?php echo $item['product']->id; ?>">Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3"><strong>Total</strong></td>
                        <td colspan="2"><strong>Rp <?php echo number_format($total, 2); ?></strong></td>
                    </tr>
                </tbody>
            </table>
            <button class="btn btn-primary" id="checkout-button">Checkout</button>
        <?php endif; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
