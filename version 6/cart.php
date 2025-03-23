<?php include "template/header.php"?>

    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/index.css">

    <div class="cart-container">
        <h1><center>Your Cart</center></h1>
        <div id="cart-items"></div>
        <p class="total">Total: €<span id="total-price">0.00</span></p>
        <a href="checkout.php"><button id="checout-btn">Continue To Checkout</button></a>
        <button onclick="clearCart()">Clear Cart</button>
    </div>

    <script>
        // Function to Display Cart Items
        function displayCart() {
            let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            let cartContainer = document.getElementById('cart-items');
            let totalPrice = 0;

            cartContainer.innerHTML = ""; // Clear cart container

            cartItems.forEach((item, index) => {
                totalPrice += parseFloat(item.price);

                cartContainer.innerHTML += `
                    <div class="cart-item">
                        <div>
                            <p><strong>${item.title}</strong></p>
                            <p>€${item.price}</p>
                        </div>
                        <button class="remove-btn" onclick="removeFromCart(${index})">Remove</button>
                    </div>
                `;
            });

            document.getElementById('total-price').textContent = totalPrice.toFixed(2);
        }

        // Function to Remove an Item
        function removeFromCart(index) {
            let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            cartItems.splice(index, 1);
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            displayCart(); // Refresh cart display
        }

        // Function to Clear the Entire Cart
        function clearCart() {
            localStorage.removeItem('cartItems');
            displayCart();
        }

        // Load Cart on Page Load
        document.addEventListener("DOMContentLoaded", displayCart);
    </script>
</body>
</html>
