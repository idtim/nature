<?php
    class Articles extends Controller {
        // fonction appelée par défaut
        public function Index() {
            $this->LoadModel("Article");
            $articles = $this->Article->GetAll();
            $this->Render('blog', compact('articles'));
        }

        // fonction pour lire un article
        public function Read($slug) {
            $this->LoadModel("Article");
            $article = $this->Article->FindBySlug($slug);
            $this->Render('blogRead', compact('article'));
        }
        
        // les fonctions Create() et Write() servent pour l'écriture d'un article
        public function Create() {
            $this->Render('rootBlogCreate');
        }
        
        public function Write() {
            $this->LoadModel("Article");
            $message = $this->Article->WriteArticle();
            $this->Render('rootBlogCreate', compact('message'));
        }
    }
?>