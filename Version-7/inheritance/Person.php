<?php
// Parent class
class Person {
    protected $name;
    protected $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    // Getters
    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }
}
?>
