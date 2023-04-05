<div id="blogPage" data-aos='fade' data-aos-duration='1000'>
    <h1>blog</h1>
    
    <?php $titlePage = "PN - blog"; ?>
    
    <div id="blogIndex">
        <?php foreach($articles as $article): ?>    
            <h3><a href="/articles/read/<?= $article->art_slug ?>"><?= $article->art_title ?></a></h3>
        <?php endforeach; ?>
    </div>
</div>