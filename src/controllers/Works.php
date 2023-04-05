<?php
    class Works extends Controller {
        // fonction appelée par défaut
        public function Index() {
            $this->LoadModel("Work");
            $works = $this->Work->GetAll();
            $this->render('portfolio', compact('works'));
        }
    }
?>