<?php
    class Tag
    {
        private int $Id;
        private string $Name;      
        private int $Category_id; 

        function __construct($Id = 0, $Name = "", $Category_id = 0)
        {
            $this->Id = $Id;
            $this->Name = $Name;
            $this->Category_id= $Category_id;
        }

        function getId() { return $this->Id; }
        function getName() { return $this->Name; }
        function getCategoryId() { return $this->Category_id; }
    }

?>