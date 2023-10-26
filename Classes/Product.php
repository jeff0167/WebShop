<?php
    class Product
    {
        private int $Id; // can't you make props
        private string $Name;
        private string $Description;
        private string $Tag_id;
        private float $Price;
        private string $ImagePath;

        function __construct($Id = 0, $Name = "", $Description = "", $Tag_id = 0, $Price = 0, $ImagePath = "")
        {
            $this->Id = $Id;
            $this->Name = $Name;
            $this->Description = $Description;
            $this->Tag_id = $Tag_id;
            $this->Price = $Price;
            $this->ImagePath = $ImagePath;
        }

        function getId() { return $this->Id; }
        function getName() { return $this->Name; }
        function getDescription() { return $this->Description; }
        function getTag_id() { return $this->Tag_id; }
        function getPrice() { return $this->Price; }
        function getImagePath() { return $this->ImagePath; }

        public function __toString(): string
        {
            return "Name: ". $this->Name . ", Description: ". $this->Description . ", Tag_id: ". $this->Tag_id . ", Price: ". $this->Price . ", Image path: ". $this->ImagePath;
        }
    }

?>