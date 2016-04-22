<?php
    class Makeup
    {
        private $name;
        private $type;
        private $cover_product;
        private $brand;
        private $price;

        function __construct($makeup_name, $makeup_type, $image_path, $makeup_brand, $makeup_price = 5.99)
        {
            $this->name = $makeup_name;
            $this->type = $makeup_type;
            $this->cover_product = $image_path;
            $this->brand = $makeup_brand;
            $this->price = $makeup_price;
        }

        function setPrice($new_price)
        {
            $float_price = (float) $new_price;
            if ($float_price != 0) {
                $formatted_price = number_format($float_price, 2);
                $this->price = $formatted_price;
            }
        }

        function getPrice()
        {
            return $this->price;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function getName()
        {
            return $this->name;
        }

        function setType($new_type)
        {
            $this->type = $new_type;
        }

        function getType()
        {
            return $this->type;
        }

        function setMakeupCover($new_cover_product)
        {
            $this->cover_product = $new_cover_product;
        }

        function getMakeupCover()
        {
            return $this->cover_product;
        }

        function setBrandType($new_brand_product)
        {
            $this->brand = $new_brand_product;
        }

        function getBrandType()
        {
            return $this->brand;
        }

        //save makeup products instance in the session array
        function save() {
            array_push($_SESSION['makeups'], $this);
        }

        static function getMakeups() {
            return $_SESSION['makeups'];
        }
    }
?>
