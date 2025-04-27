<?php
// Customer class extends Person
class Customer extends Person {
    private $address;

    public function __construct($name, $email, $address) {
        parent::__construct($name, $email); // Call the parent constructor
        $this->address = $address;
    }

    // Getter for address
    public function getAddress() {
        return $this->address;
    }
}
?>
