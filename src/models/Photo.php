<?php
    class Photo extends Model {
        // constructeur
        public function __construct() {
            $this->_table = "Photos";
            $this->GetConnection();
        }

        // renvoi toutes les photos avec les infos jointes de la BDD
        public function GetAllPhotos(){
            $sql = "SELECT * FROM ".$this->_table.
                   " JOIN Countries on pho_cou_id = cou_id 
                     JOIN Continents on cou_con_id = con_id
                     JOIN Coeff on pho_coe_id = coe_id";
            $query = $this->_connection->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);    
        }
    }
?>