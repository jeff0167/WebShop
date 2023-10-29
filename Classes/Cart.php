<?php
    class Cart
    {
        private int $Id;
        private int $Person_id;

        function __construct($Id = 0, $Person_id = 0)
        {
            $this->Id = $Id;
            $this->Person_id = $Person_id;
        }

        function getId() { return $this->Id; }
        function getName() { return $this->Person_id; }
    }

?>