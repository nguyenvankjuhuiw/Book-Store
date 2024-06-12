<?php

require_once 'dao/FeedbackDAO.php';

class OrderDetail {
    private $book;
    private $quantity;
    private $feedback;
    
    // Constructor
    public function __construct($row=null) {
        $this->book = (new BookDAO())->getBookById($row['bookid']) ?? null;
        $this->quantity = $row['quantity'] ?? null;
        $this->feedback = (new FeedbackDAO())->getFeedbackById($row['feedbackid']) ?? null;
    }
    
    // Getter và setter cho $book
    public function getBook() {
        return $this->book;
    }

    public function setBook($book) {
        $this->book = $book;
    }
    
    // Getter và setter cho $quantity
    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function getFeedback(){
        return $this->feedback;
    }
}
