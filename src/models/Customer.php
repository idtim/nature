<?php
    class Customer extends Model {
        // constructeur
        public function __construct() {
            $this->_table = "Customers";
            $this->GetConnection();
        }
    }
?>