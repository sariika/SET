<?php include "template/header.php"?>
<?php require "config.php"; // Include the database connection?>
<link rel="stylesheet" href="css/index.css">

    
        <div class="container">
    <h1><center>Our Products</center></h1>
    
    <div class="content-wrapper">
        <div class="product-row">
            <div class="product">
                <img src="images/timer.jpg" alt="Product 1">
                <h3>Timer</h3>
                <p>€19.99</p>
                <button class="btn add-to-cart" data-title="timer" data-price="19.99">Add to Cart</button>
            </div>

            <div class="product">
                <img src="images/stationary.jpg" alt="Product 2">
                <h3>Stationary Set</h3>
                <p>€24.99</p>
                <button class="btn add-to-cart" data-title="stationary" data-price="24.99">Add to Cart</button>
            </div>
            <div class = "product">
                <img src = "images/mug.webp" alt = "Product 3">
                <h3>Mug</h3>
                <p>€10.00</p>
                <button class = "btn add-to-cart" data-title = "mug" data-price = 10.00> Add to Cart</button>
            
            </div>
            <div class = "product">
                <img src = "images/watch.jpg" alt = "Product 4">
                <h3>Smart watch</h3>
                <p>€50.99</p>
                <button class = "btn add-to-cart" data-title = "watch" data-price = 50.99> Add to Cart</button>
            
            </div>
            
            
        </div>

        <!-- CART SECTION -->
        <div class="cart">
            <h2>Shopping Cart</h2>
            <ul id="cart-items"></ul>
            <a href="cart.php"><button id = checkout>Continue to Cart</button></a>
        </div>
    </div>
</div>

    
<script>
document.addEventListener("DOMContentLoaded", function() {
    loadCart(); // Load cart items when page loads

    document.body.addEventListener("click", function(event) {
        if (event.target.classList.contains("add-to-cart")) {
            const button = event.target;
            const title = button.getAttribute("data-title");
            const price = button.getAttribute("data-price");

            addToCart(title, price);
        }
    });
});

function addToCart(title, price) {
    let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    cartItems.push({ title, price });
    localStorage.setItem('cartItems', JSON.stringify(cartItems));

    loadCart(); // Refresh cart display
}

function loadCart() {
    let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    let cartList = document.getElementById("cart-items");
    cartList.innerHTML = ""; // Clear current cart display

    cartItems.forEach((item, index) => {
        let li = document.createElement("li");
        li.innerHTML = `${item.title} - €${item.price} 
            <button onclick="removeFromCart(${index})" class="remove-btn">Remove</button>`;
        cartList.appendChild(li);
    });
}

function removeFromCart(index) {
    let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    cartItems.splice(index, 1);
    localStorage.setItem('cartItems', JSON.stringify(cartItems));

    loadCart(); // Refresh cart display
}
</script>


<?php include "template/footer.php" ?>