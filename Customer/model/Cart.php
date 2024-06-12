<?php

require_once 'dao/BookDAO.php';

class Cart {
    private $book;
    private $quantity;
    private $checkbox;

    public function __construct($row) {
        $this->book = (new BookDAO())->getBookById($row['bookid']);
        $this->quantity = $row['quantity'];
        $this->checkbox = $row['checkbox'] ?? 0;
    }

    // Getter methods
    public function getBook() {
        return $this->book;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getCheckbox() {
        return $this->checkbox;
    }

    // Setter methods
    public function setBook($book) {
        $this->book = $book;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
}
