<?php

try {
    require "config.php"; // Include your config file for DB connection
    
    // Database connection
    $connection = new PDO($dsn, $username, $password, $options);
    
    // Get the cart data from POST request (which comes from the form on the cart page)
    if (isset($_POST['cart_data'])) {
        $cartItems = json_decode($_POST['cart_data'], true);  // Decode the JSON cart data from the form

        // Check if there are any cart items
        if (!empty($cartItems)) {
            // Assuming you have a user ID (or use a guest cart if not logged in)
            $userId = 1; // Replace this with the actual logged-in user's ID
            
            // Iterate through each cart item and insert into the database
            foreach ($cartItems as $item) {
                // Example: Insert into the 'cart' table with 'user_id', 'product_id', 'quantity', and 'price'
                $stmt = $connection->prepare("INSERT INTO cart (user_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
                $stmt->execute([$userId, $item['id'], 1, $item['price']]); // Assuming quantity is 1 for simplicity
            }

            // Redirect to the checkout page or confirmation page
            header("Location: checkout.php");
            exit;
        } else {
            echo "Cart is empty!";
        }
    } else {
        echo "No cart data received!";
    }
} catch(PDOException $error) {
    echo "Error: " . $error->getMessage();
}
?>
