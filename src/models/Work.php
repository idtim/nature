<?php
    class Work extends Model {
        // constructeur
        public function __construct() {
            $this->_table = "Works";
            $this->GetConnection();
        }
    }
?>