<?php

require_once 'dao/GenreDAO.php';
require_once 'dao/FeedbackDAO.php';

class Book {
    private $bookid;
    private $genre;
    private $bookname;
    private $image;
    private $quantity;
    private $quantitysale;
    private $costprice;
    private $saleprice;
    private $distributor;
    private $publisher;
    private $year;
    private $author;
    private $translator;
    private $size;
    private $pages;
    private $weight;
    private $description;
    private $feedback;

    // Constructor
    public function __construct($row) {
        $this->bookid = $row['bookid'];
        $this->genre = (new GenreDAO())->getGenreById($row['genreid']);
        $this->bookname = $row['bookname'];
        $this->image = $row['image'];
        $this->quantity = $row['quantity'];
        $this->quantitysale = $row['quantitysale'];
        $this->costprice = $row['costprice'];
        $this->saleprice = $row['saleprice'];
        $this->distributor = $row['distributor'];
        $this->publisher = $row['publisher'];
        $this->year = $row['year'];
        $this->author = $row['author'];
        $this->translator = $row['translator'];
        $this->size = $row['size'];
        $this->pages = $row['pages'];
        $this->weight = $row['weight'];
        $this->description = $row['description'];
        $this->feedback = (new FeedbackDAO())->getFeedbackByBookid($row['bookid']);
    }

    // Getter methods
    public function getBookId() {
        return $this->bookid;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function getBookName() {
        return $this->bookname;
    }

    public function getImage() {
        return $this->image;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getQuantitySale() {
        return $this->quantitysale;
    }

    public function getCostPrice() {
        return $this->costprice;
    }

    public function getSalePrice() {
        return $this->saleprice;
    }

    public function getDistributor() {
        return $this->distributor;
    }

    public function getPublisher() {
        return $this->publisher;
    }

    public function getYear() {
        return $this->year;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getTranslator() {
        return $this->translator;
    }

    public function getSize() {
        return $this->size;
    }

    public function getPages() {
        return $this->pages;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getFeedback() {
        return $this->feedback;
    }

    public function getMediumStar(){
        $listfeedback = $this->getFeedback();
        $mediumstar = 0;
        $count = sizeof($listfeedback);
        if($count == 0){
            return 0;
        }
        foreach($listfeedback as $feedback){
            $mediumstar = $mediumstar + $feedback->getStar();
        }
        return $mediumstar / $count;
    }

    // Setter methods
    public function setBookId($bookid) {
        $this->bookid = $bookid;
    }

    public function setGenre($genre) {
        $this->genre = $genre;
    }

    public function setBookName($bookname) {
        $this->bookname = $bookname;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function setCostPrice($costprice) {
        $this->costprice = $costprice;
    }

    public function setSalePrice($saleprice) {
        $this->saleprice = $saleprice;
    }

    public function setDistributor($distributor) {
        $this->distributor = $distributor;
    }

    public function setPublisher($publisher) {
        $this->publisher = $publisher;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setTranslator($translator) {
        $this->translator = $translator;
    }

    public function setSize($size) {
        $this->size = $size;
    }

    public function setPages($pages) {
        $this->pages = $pages;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setFeedback($weight) {
        $this->feedback = $feedback;
    }
}
