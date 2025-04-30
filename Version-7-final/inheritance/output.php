<?php
// Include all classes
include_once "Person.php";
include_once "Customer.php";
include_once "Sale.php";

// Create a customer
$customer = new Customer("John", "Doe", "johndoe@example.com");

// Create a sale
$sale = new Sale($customer, date("Y-m-d"));

// Add products to the sale
$sale->addProduct("Timer", 19.99);
$sale->addProduct("Stationary", 24.99);

// Display sale details
$sale->displaySale();
?>
