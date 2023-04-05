<?php
    class Photos extends Controller {
        // fonction appelée par défaut
        public function Index() {
            $this->LoadModel("Photo");
            $photos = $this->Photo->GetAllPhotos();
            $this->render('gallery', compact('photos'));
        }
    }
?>