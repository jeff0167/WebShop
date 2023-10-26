<?php
     class ProductCart
     {
         private int $Product_id; 
         private int $Cart_id;
         private int $Amount;
 
         function __construct($Product_id = 0, $Cart_id = 0, $Amount = 0)
         {
             $this->Product_id = $Product_id;
             $this->Cart_id = $Cart_id;
             $this->Amount = $Amount;
         }
 
         function getProductId() { return $this->Product_id; }
         function geCartId() { return $this->Cart_id; }
         function getAmount() { return $this->Amount; }
 
         public function __toString(): string
         {
             return "Cart id: ". $this->Cart_id . ", Product id: ". $this->Product_id . ", Amount: ". $this->Amount;
         }
     }
?>