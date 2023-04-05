<div id="blogPageCreate" data-aos='fade' data-aos-duration='1000'>
    <h1>écrire un article</h1>
    
    <?php 
        $titlePage = "PN - créer un article";
    ?>

    <form id="blogFormCreate" action="write" method="post">
        <div>
            <label for="art_date">Date de création</label>
            <input name="art_date" id="art_date" type="date" value="<?= date("Y-m-d"); ?>">
        </div>
        <div>
            <label for="art_title">Titre de l'article</label>
            <input name="art_title" id="art_title" type="text">
        </div>
        <div>
            <label for="art_slug">Slug de l'article</label>
            <input name="art_slug" id="art_slug" type="text">
        </div>
        <div>
            <label for="art_content">Contenu de l'article</label>
            <textarea name="art_content" id="art_content" rows="10"></textarea>
        </div>
        <div>
            <label for="art_cat_id">Catégorie de l'article</label>
            <input name="art_cat_id" id="art_cat_id" type="text">
        </div>
        <button type="submit">Enregistrer</button>
    </form>

    <?php 
        if (!empty($message)) {
            echo "<p>".$message."</p>";
        }
    ?>
</div>