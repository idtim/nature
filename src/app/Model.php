<?php
    abstract class Model{
        // informations de la base de données
        private $_host = "(local)";
        private $_dbName = "xxxxx";
        private $_username = "xxxxx";
        private $_password = "xxxxx";
        
        // propriété qui contiendra l'instance de la connexion
        protected $_connection;

        // propriétés permettant de personnaliser les requêtes
        public $_table;
        public $_id;

        // connection à la BDD
        public function GetConnection(){
            // suppression la connexion précédente
            $this->_connection = null;

            // test de connection à la BDD
            try{
                $this->_connection = new PDO("sqlsrv:Server=" . $this->_host . ";Database=" . $this->_dbName, $this->_username, $this->_password);
            }catch(PDOException $exception){
                echo "Erreur de connexion : " . $exception->getMessage();
            }
        }

        // renvoi toutes les données de la table demandée
        public function GetAll(){
            $sql = "SELECT * FROM ".$this->_table;
            $query = $this->_connection->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);    
        }
    }
?>