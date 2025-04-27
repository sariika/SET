<?php
try {
    require "config.php"; // Include the config file for DB connection
    
    // Database connection
    $connection = new PDO($dsn, $username, $password, $options);
    
    // SQL to fetch customers
    $sql = "SELECT * FROM customers";
    
    $statement = $connection->prepare($sql);
    $statement->execute();
    
    $customers = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $error) {
    echo "Error: " . $error->getMessage();
}
?>

<h2>Customer List</h2>

<table border="1">
    <tr>
        <th>Order ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Actions</th>
    </tr>
    
    <?php foreach ($customers as $customer): ?>
        <tr>
            <td><?php echo htmlspecialchars($customer['id']); ?></td>
            <td><?php echo htmlspecialchars($customer['firstname']); ?></td>
            <td><?php echo htmlspecialchars($customer['lastname']); ?></td>
            <td><?php echo htmlspecialchars($customer['email']); ?></td>
            <td><?php echo htmlspecialchars($customer['phoneno']); ?></td>
            <td><?php echo htmlspecialchars($customer['address']); ?></td>
            <td>
                <a href="update.php?id=<?php echo $user['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $user['id']; ?>">Delete</a>
            </td>
 
        </tr>
    <?php endforeach; ?>
</table>

<a href="product2.php">Back to Product page</a>
