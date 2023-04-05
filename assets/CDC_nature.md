# Projet Nature - Cahier des charges

> But du site : 
site d'un photographe naturaliste pour promovoir son activité sur internet et vendre des photos au format papier. 

* Le site sera composé :
    1. d'une page d'accueil  
    2. d'une galerie photo
    3. d'un portfolio professionel 
    4. d'un blog
    5. d'une page de contact
    6. d'une page de connexion
    7. d'un espace administrateur
    8. d'un espace utilisateur
    9. d'un espace caché "easter egg"

> Détails des fonctionnalités :  

1. Page d'accueil :
    - Cette page principale accueillera l'internaute avec une photo du jour que choisira le photographe et un texte relativement court qui présentera le photographe, ses activités ainsi que les possibilités qu'offre le site aux utilisateurs.

2. Galerie photo :  
    - La galerie photo rassemble toutes les photos que le photographe souhaite exposer et/ou vendre. La grande majorité des photos sont achetables au format papier en qualité photo dans différents formats (photos classiques, A4, poster, etc). Utilisation d'une API pour les pays et ville utilisateur et photos.
    - La galerie sera sous forme de mosaïque avec un petit aperçu carré pour chaque photo. Quand l'utilisateur cliquera sur l'aperçu d'une photo, une fenêtre s'ouvrira dans laquelle il pourra voir la photo dans son format d'origine, la fiche descriptive de la photo (nom, date, lieux, histoire, etc) et un espace d'achat avec les formats disponibles à la vente, le prix et la quantité souhaitée. L'achat est envoyé dans le panier depuis cet espace. Il sera possible d'afficher la galerie complète (par défaut) ou de faire des filtres.

3. Portfolio professionel :
    - Cette page recence tous les projets professionnels sur lequels a travaillé le photographe qui mettent en valeur ses compétences et son expérience. 
    - Comme pour la galerie, le portfolio sera sous forme de mosaïque avec des aperçus carrés. En cliquant sur un aperçu l'utilisateur verra la photo ou le pack de photo du projet dans le format d'origine. Les descriptions seront plus détaillées que dans la galerie (client, techniques utilisées, produits finis, etc). Il n'y a pas de possibilités d'achats pour les photos du portfolio. 
    
4. Blog :
    - Le blog sera composé d'article que le photographe publiera (cours, tips, etc). Par défaut, les articles seront triés du plus récent au plus ancien. L'utilisateur pourra faire une recherche par mot, par phrase ou par date pour trouver un article particulier. La page dédiée au blog aura un index dans lequel les articles seront triés par mot clé / catégorie et dans une catégorie les titres complets des articles apparaitront et seront triés par ordre alphabétique. (En option : ajouter un index des articles par année de parution)

5. Page de contact :
    - La page de contact sera un simple formulaire où l'utilisateur devra renseigner son adresse mail, l'objet du message, le texte du message et un bouton d'envoi. Tous les champs seront obligatoires.

6. Page de connection :
    - La page de connection permettra à l'utilisateur de créer un compte et/ou de se connecter à son compte personnel. Il y aura un bouton "Connection" et un lien en cas de mot de passe oublié et un lien pour créer un compte.

7. Espace administrateur :
    - Cet espace réservé au photographe lui permettra de gérer sa galerie, son portfolio, ses articles et les comptes utilisateur.

8. Espace utilisateur :
    - Cet espace permettra à l'utilisateur de configurer son profil (image de profil, mot de passe, pseudo, etc.), de consulter son panier, de régler ses commandes et voir l'historique des commandes passées (avec tri et recherches).

9. Espace caché "easter egg" : 
    - Cet espace sera accessible grâce à un lien caché sur le site. Le lien sera actif dès qu'une suite d'action sera effectuée. Dans la page d'accueil le photographe parlera de façon "codée" de cet espace ainsi que du moyen pour le trouver. Le lien emmenera l'utilisateur vers une nouvelle page qui sera sous forme d'un terminal rétro.
    - La commande "help" permettra de savoir comment utiliser le terminal. Le terminal permettra de lancer au moyen de ligne de commande des petits jeux. En jouant à ces jeux l'utilisateur accumulera des points. Le total de ses points sera consultable dans l'espace perso de l'utilisateur. Les points offriront à l'utilisateur des réductions qu'il pourra utiliser pour l'achat de photos.
    - Un classement basés sur le nombre de points obtenus par les utilisateurs sera accessible depuis l'espace personnel. Chaque J1 du mois l'utilisateur qui sera en première place recevra un prix (réduction supplémentaire, photo gratuite, etc). 

> Informations supplémentaires :

* Aucune page du site n'aura de scroll vertical, tout se passera sur un espace classique 16/9. Le scroll vertical sera utilisé uniquement pour le responsive (écrans tablettes et téléphones).

* Un menu apparaitra en haut de page sur l'ensemble du site. Seul l'espace caché n'aura pas de menu.

* Le menu permettra d'aller sur les différentes pages du site. Il y aura un lien vers les réseaux sociaux du photographe. Pour les écrans smartphone et tablette le menu sera en mode "hamburger".