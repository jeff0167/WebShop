<?php
    class Person
    {
        private int $Id;
        private string $Name;
        private string $PhoneNumber;
        private string $Address;
        private string $Email;
        private string $Password;
        private bool $IsAdmin;

        function __construct($Id = 0, $Name = "", $Email = "", $PhoneNumber = "", $Address = "", $Password = "", $IsAdmin = false)
        {
            $this->Id = $Id;
            $this->Name = $Name;
            $this->PhoneNumber = $PhoneNumber;
            $this->Address = $Address;
            $this->Email = $Email;
            $this->Password = $Password;
            $this->IsAdmin = $IsAdmin;
        }

        function getId() { return $this->Id; }
        function getName() { return $this->Name; }
        function getPhoneNumber() { return $this->PhoneNumber; }
        function getAddress() { return $this->Address; }
        function getEmail() { return $this->Email; }
        function getPassword() { return $this->Password; }
        function getIsAdmin() { return $this->IsAdmin; }
    }

?>