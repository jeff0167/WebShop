<?php
    class Tag
    {
        private int $Id;
        private string $Name;      
        private string $Tag_id; 

        function __construct($Id, $Name, $Tag_id)
        {
            $this->Id = $Id;
            $this->Name = $Name;
            $this->Tag_id = $Tag_id;
        }
    }

?>