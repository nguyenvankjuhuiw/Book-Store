<?php 

class MethodPayment {
    private $id;
    private $name;

    // Constructor
    public function __construct($row) {
        $this->id = $row['id'];
        $this->name = $row['name'];
    }

    // Getter for id
    public function getId() {
        return $this->id;
    }

    // Setter for id
    public function setId($id) {
        $this->id = $id;
    }

    // Getter for name
    public function getName() {
        return $this->name;
    }

    // Setter for name
    public function setName($name) {
        $this->name = $name;
    }
}
?>
