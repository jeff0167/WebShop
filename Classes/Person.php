<?php
    class Product
    {
        private int $Id;
        private string $Name;
        private string $Email;
        private string $PhoneNumber;
        private string $Password;

        function __construct($Id, $Name, $Email, $PhoneNumber, $Password)
        {
            $this->Id = $Id;
            $this->Name = $Name;
            $this->Email = $Email;
            $this->PhoneNumber = $PhoneNumber;
            $this->Password = $Password;
        }
    }

?>