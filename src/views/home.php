<div id="homePage">
    <div>
        <?php
            // affichage de la photo qui a le flag "photo du jour" dans la BDD
            if ($potd == false) {
                echo "<p>Pas de photo du jour aujourd'hui, désolé !</p>";
            } else {
                echo "<img id='photoOfTheDay' src='".$potd->pho_path."' data-aos='fade' data-aos-duration='2000'>";
            }
        ?>
        
        <p id="paragraphPhotoOfTheDay" data-aos="fade" data-aos-duration="2500" data-aos-delay="250">
            Bienvenue sur <strong>nature.com</strong>.</br>
            Je suis photographe.</br>
            Pour le reste vous êtes grand, vous savez vous servir d'internet, donc baladez-vous où vous voulez !</br>
            Qui sait, vous trouverez peut-être la salle caché<a href="ee.html" target="_blank">e</a>...
        </p>
    </div>
</div>