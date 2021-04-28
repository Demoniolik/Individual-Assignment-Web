<?php 
    class Product {
        public $id;
        public $name;
        public $price;
        public $poster;
        public $isAvailable;
        public $specialProposition;
        public $categoryId;

        public function __construct($id, $name, $price, $poster, 
        $isAvailable, $specialProposition, $categoryId) {

            $this->id = $id;
            $this->name = $name;
            $this->price = $price;
            $this->poster = $poster;
            $this->isAvailable = $isAvailable;
            $this->specialProposition = $specialProposition;
            $this->categoryId = $categoryId;
        }

        public function toString() {
            return "id: " . $this->id . "</br>" 
                . "name: " . $this->name . "</br>"
                . "price: " . $this->price . "</br>"
                . "poster: " . $this->poster . "</br>"
                . "isAvailable: " . $this->isAvailable . "</br>"
                . "specialProposition: " . $this->specialProposition . "</br>"
                . "categoryId: " . $this->categoryId . "</br>";
        }
    }
?>