<?php 
    class Product {
        public $id;
        public $name;
        public $price;
        public $description;
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

        public static function buildProduct($id, $name, $price, $description, $poster, 
        $isAvailable, $specialProposition, $categoryId) {
            $product = new Product(
                $id, $name, $price, $poster, $isAvailable, 
                $specialProposition, $categoryId
            );
            $product->$description = $description;

            return $product;
        }

        public function toString() {
            return "id: " . $this->id . "</br>" 
                . "name: " . $this->name . "</br>"
                . "price: " . $this->price . "</br>"
                . "description: " . $this->desciption . "</br>"
                . "poster: " . $this->poster . "</br>"
                . "isAvailable: " . $this->isAvailable . "</br>"
                . "specialProposition: " . $this->specialProposition . "</br>"
                . "categoryId: " . $this->categoryId . "</br>";
        }
    }
?>