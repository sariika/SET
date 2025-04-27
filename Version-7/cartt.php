<?php
    session_start();
    require_once "DBconnect.php";
    require "template/header.php";

    if (empty($_SESSION['cart'])) {
        echo " Your cart is empty.";
        exit;
    }

    if (isset($_POST['continue_to_cart'])) {
        try {
        // Create empty order
            $sql = "INSERT INTO orders () VALUES ()";
            $statement = $connection->prepare($sql);
            $statement->execute();
            $order_id = $connection->lastInsertId();

        // Insert each item
            foreach ($_SESSION['cart'] as $product_id => $product) {
                $sql = "INSERT INTO order_items (order_id, product_id, quantity, price) 
                        VALUES (:order_id, :product_id, :quantity, :price)";
                $statement = $connection->prepare($sql);
                $statement->bindValue(':order_id', $order_id);
                $statement->bindValue(':product_id', $product_id);
                $statement->bindValue(':quantity', $product['quantity']);
                $statement->bindValue(':price', $product['price']);
                $statement->execute();
            }

            unset($_SESSION['cart']); // Clear the cart
            header("Location: checkout.php");
            exit;
        } catch (PDOException $e) {
           // echo "Error: " . $e->getMessage();
            exit;
        }
    }

    // Fetch product details to display (for title)
    $product_ids = array_keys($_SESSION['cart']);
    $placeholders = implode(',', array_fill(0, count($product_ids), '?'));
    $sql = "SELECT * FROM products WHERE id IN ($placeholders)";
    $statement = $connection->prepare($sql);
    $statement->execute($product_ids);
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Your Cart</title>
        <link rel="stylesheet" href="css/cart.css?v=2">
        <link rel="stylesheet" href="css/timeform.css">
    </head>
    <body>

        <h2>Your Cart</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
            </thead>
        <tbody>
            <?php foreach ($products as $product): 
                $product_id = $product['id'];
                $quantity = $_SESSION['cart'][$product_id]['quantity'];
            ?>
            <tr>
                <td><?= htmlspecialchars($product['title']) ?></td>
                <td>€<?= number_format($product['price'], 2) ?></td>
                <td><?= $quantity ?></td>
                <td>€<?= number_format($product['price'] * $quantity, 2) ?></td>
                <td><a href="deleteCart.php?id=<?= $product_id ?>"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg></a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>

        <form class ="chbutton" method="POST" action="checkout.php">
            <button type="submit" name="checkout">Continue to Checkout</button>
            
        </form>

    </body>
</html>
