<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 5px 0 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn {
            background: black;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Checkout</h2>
        <form action="/submit-checkout" method="POST">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="address">Shipping Address</label>
            <input type="text" id="address" name="address" required>

            <label for="city">City</label>
            <input type="text" id="city" name="city" required>

            <label for="zip">Zip Code</label>
            <input type="text" id="zip" name="zip" required>

            <label for="payment">Payment Method</label>
            <select id="payment" name="payment">
                <option value="credit">Credit Card</option>
                <option value="paypal">PayPal</option>
            </select>

            <label for="card">Card Number</label>
            <input type="text" id="card" name="card" required>

            <button type="submit" class="btn">Place Order</button>
        </form>
    </div>
</body>
</html>
