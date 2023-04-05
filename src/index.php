<?php
    // constante contenant le chemin vers la racine publique du projet
    define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));

    require_once(ROOT.'app/Controller.php');
    require_once(ROOT.'app/Model.php');

    // séparation des paramètres et mis dans $params
    $params = explode('/', $_GET['p']);

    // Si au moins 1 paramètre existe
    if($params[0] != ""){
        // sauvegarde du 1er paramètre dans $controller en mettant sa 1ère lettre en majuscule
        $controller = ucfirst($params[0]);
        
        // sauvegarde du 2ème paramètre dans $action si il existe, sinon index
        $action = isset($params[1]) ? $params[1] : 'index';

        // appel du contrôleur
        require_once(ROOT.'controllers/'.$controller.'.php');

        $controller = new $controller();

        if(method_exists($controller, $action)){
            unset($params[0]);
            unset($params[1]);
            call_user_func_array([$controller, $action], $params);    
        }else{
            // On envoie le code réponse 404
            http_response_code(404);
            echo "La page recherchée n'existe pas";
        }
    } else {
        // appel le contrôleur par défaut
        require_once(ROOT.'controllers/Home.php');

        $controller = new Home();
        $controller->Index();
    }
?>