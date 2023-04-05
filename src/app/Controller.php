<?php
    // classe parente de tous les controllers
    abstract class Controller {
        // chargement du "model" demandé
        public function LoadModel(string $model) {
            require_once(ROOT.'models/'.$model.'.php');
            $this->$model = new $model();
        }

        // affichage des données dans la "view" demandé
        public function Render(string $file, array $data = []) {
            extract($data);

            // démarrage du buffer
            ob_start();

            // chargement de la "view"
            require_once(ROOT.'views/'.$file.'.php');
            $content = ob_get_clean();
            
            // chargement du template
            require_once(ROOT.'views/layouts/default.php');
        }
    }
?>