document.addEventListener('DOMContentLoaded', function() {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    const removeFromCartButtons = document.querySelectorAll('.remove-from-cart');
    const checkoutButton = document.getElementById('checkout-button');

    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.productId;
            addToCart(productId);
        });
    });

    removeFromCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.productId;
            removeFromCart(productId);
        });
    });

    if (checkoutButton) {
        checkoutButton.addEventListener('click', function() {
            checkoutCart();
        });
    }

    function addToCart(productId) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        const productIndex = cart.findIndex(item => item.id == productId);

        if (productIndex === -1) {
            cart.push({ id: productId, quantity: 1 });
        } else {
            cart[productIndex].quantity += 1;
        }

        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartCookie();
        alert('Produk berhasil ditambahkan ke keranjang!');
    }

    function removeFromCart(productId) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart = cart.filter(item => item.id != productId);

        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartCookie();
        location.reload();
    }

    function checkoutCart() {
        localStorage.removeItem('cart');
        updateCartCookie();
        alert('Checkout berhasil!');
        location.reload();
    }

    function updateCartCookie() {
        const cart = localStorage.getItem('cart');
        document.cookie = `cart=${cart}; path=/`;
    }

    updateCartCookie();
});
