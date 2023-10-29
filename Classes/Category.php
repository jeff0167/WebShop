<?php
    class Category
    {
        private int $Id;
        private string $Name;

        function __construct($Id = 0, $Name)
        {
            $this->Id = $Id;
            $this->Name = $Name;
        }
    }

?>