<?php
// Sale class
class Sale {
    private $customer;
    private $products = [];
    private $totalPrice = 0;
    private $saleDate;

    public function __construct(Customer $customer, $saleDate) {
        $this->customer = $customer;
        $this->saleDate = $saleDate;
    }

    // Add product to the sale
    public function addProduct($productName, $price) {
        $this->products[] = ["name" => $productName, "price" => $price];
        $this->totalPrice += $price;
    }

    // Get total sale price
    public function getTotalPrice() {
        return $this->totalPrice;
    }

    // Display sale details
    public function displaySale() {
        echo "Sale for Customer: " . $this->customer->getName() . "<br>";
        echo "Email: " . $this->customer->getEmail() . "<br>";
        echo "Address: " . $this->customer->getAddress() . "<br>";
        echo "Sale Date: " . $this->saleDate . "<br>";
        echo "Products Purchased:<br>";

        foreach ($this->products as $product) {
            echo "- " . $product["name"] . " (€" . $product["price"] . ")<br>";
        }

        echo "<b>Total Price: €" . $this->getTotalPrice() . "</b><br>";
    }
}
?>
