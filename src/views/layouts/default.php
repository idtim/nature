<!-- page template -->

<?php @session_start() ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $titlePage ?? "PN - accueil" ?></title>
        <link rel="stylesheet" type="text/css" href="../../css/default.css"/>
        <link rel="stylesheet" type="text/css" href="../../css/header.css"/>
        <link rel="stylesheet" type="text/css" href="../../css/home.css"/>
        <link rel="stylesheet" type="text/css" href="../../css/gallery.css"/>
        <link rel="stylesheet" type="text/css" href="../../css/portfolio.css"/>
        <link rel="stylesheet" type="text/css" href="../../css/blog.css"/>
        <link rel="stylesheet" type="text/css" href="../../css/contact.css"/>
        <link rel="stylesheet" type="text/css" href="../../css/connection.css"/>
        <link rel="shortcut icon" type="image/png" href="../../assets/images/favicon.png"/>
        <!-- librairie JS pour les animations -->
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <!-- Google font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
        <!-- Google icon -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    </head>

    <body>
        <header>
            <?php require_once(ROOT.'views/header.php'); ?>
        </header>
        
        <main>
            <?= $content ?>
        </main>
        
        <footer>
            <?php require_once(ROOT.'views/footer.php'); ?>
        </footer>
        
        <!-- librairie JS pour les animations -->
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script src="http://nature/js/start.js"></script>
    </body>
</html>