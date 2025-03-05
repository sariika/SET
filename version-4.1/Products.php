<?php include "template/header.php" ;?>   

<h1>Products</h1>
    <hr>
    
    <h2>Our Best Sellers</h2>

    <?php
    echo "We sell timers and merchandise. ";
    echo "Our timers will help you stay on top of all your daily tasks and keep track of your time. ";
    echo "Our merchandise includes different types of stationary.";
    echo "";
    ?>

    <div class="row">
        <div class="column">
            <img src="images/timer.jpg" alt="Timer" height = 200 width = 250>
            <!--<form action="checkout.php" method="POST">
                <input type="hidden" name="product" value="Timer">
                <button type="submit" class="btn">Buy Now</button>
            </form>-->
            <p>Price: €15</p>
        </div>
        <div class="column">
            <img src="images/stationary.jpg" alt="Stationery" width = 200 height = 250>
            <!--<form action="checkout.php" method="POST">
                <input type="hidden" name="product" value="Stationery">
                <button type="submit" class="btn">Buy Now</button>
            </form>-->
            <p>Price: €20</p>
        </div>
    </div>
            <div class="cart">
                <h2><center>Shopping Cart</center></h2>
            <ul id="cart-items"></ul>
            <p><strong>Total:</strong> $<span id="cart-total">0.00</span></p>
            <form action="checkout.php" method="POST">
                <input type="hidden" name="cartData" id="cartData">
                <button type="submit" class="checkout-btn">Proceed to Checkout</button>
            </form>
        </div>



        <?php include "template/footer.php" ;?> 