<?php
    class HomePotd extends Model {
        // constructeur
        public function __construct() {
            $this->_table = "Photos";
            $this->GetConnection();
        }

        // gestion de la photo deu jour de la page d'accueil
        public function FindPotd() {
            $sql = "SELECT * FROM ".$this->_table." WHERE pho_otd = '1'";
            $query = $this->_connection->prepare($sql);
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);    
        }
    }
?>