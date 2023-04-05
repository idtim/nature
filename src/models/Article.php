<?php
    class Article extends Model {
        // constructeur
        public function __construct() {
            $this->_table = "Articles";
            $this->GetConnection();
        }

        // affichage de l'article sélectionné
        public function FindBySlug(string $slug) {
            $sql = "SELECT * FROM ".$this->_table." WHERE art_slug = '".$slug."'";
            $query = $this->_connection->prepare($sql);
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);    
        }
        
        // enregistrement d'un nouvel article
        public function WriteArticle() {
            if (!empty($_POST)) {
                if (isset($_POST["art_title"], $_POST["art_content"])
                    && !empty($_POST["art_title"]) && !empty($_POST["art_content"])) {

                    if ($_POST["art_date"] == date("Y-m-d")) {
                        $art_date = strip_tags($_POST["art_date"]);
                        $art_date_update = null;
                        $art_title = strip_tags($_POST["art_title"]);
                        $art_slug = strip_tags($_POST["art_slug"]);
                        $art_content = htmlspecialchars($_POST["art_content"]);
                        $art_cat_id = strip_tags($_POST["art_cat_id"]);
                        
                        $sql = "INSERT Articles (art_date, art_date_update, art_title, art_slug, art_content, art_cat_id) 
                            VALUES (:art_date, :art_date_update, :art_title, :art_slug, :art_content, :art_cat_id)";
                        
                        $query = $this->_connection->prepare($sql);
                        
                        $query->bindValue(":art_date", $art_date, PDO::PARAM_STR);
                        $query->bindValue(":art_date_update", $art_date_update, PDO::PARAM_STR);
                        $query->bindValue(":art_title", $art_title, PDO::PARAM_STR);
                        $query->bindValue(":art_slug", $art_slug, PDO::PARAM_STR);
                        $query->bindValue(":art_content", $art_content, PDO::PARAM_STR);
                        $query->bindValue(":art_cat_id", $art_cat_id, PDO::PARAM_STR);
                        
                        if(!$query->execute()) {
                            return "L'article n'a pas été enregistré";
                        } else {
                            $id = $this->_connection->lastInsertId();
                            return "L'article a été ajouté !";
                        }
                    } else {
                        return "La date de création doit être la date du jour.";
                    }
                } else {
                    return "Le formulaire est incomplet";
                }
            } 
        }
    }
?>