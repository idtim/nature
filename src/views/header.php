<ul id="menu">
    <li><a href="/">accueil</a></li>
    <li><a href="../../photos">galerie</a></li>
    <li><a href="../../works">portfolio</a></li>
    <li><a href="../../articles">blog</a></li>
    <?php 
        // accès à la page "écrire un article" pour les utilisateurs avec le rôle "admin"
        if (isset($_SESSION["user"])) {
            if ($_SESSION["user"]["ses_role"] == "admin") {
                echo "<li><a href='../../articles/create'>écrire un article</a></li>";
            }
        }
    ?>
    <li><a href="../../contact">contact</a></li>
</ul>
  
<div id="perfil">
    <?php
        // affichage des boutons "connexion/déconnexioné en fonction de l'état de la connexion
        if (isset($_SESSION["user"])) {
            echo "<p> Bonjour ".$_SESSION["user"]["ses_username"]."</p>";
            echo "<button><a href='../../logins/deconnection'>déconnexion</a></button>";
        } else {
            echo "<button><a href='../../logins'>connexion</a></button>";
        }
    ?>
</div>