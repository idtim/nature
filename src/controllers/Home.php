<?php
    class Home extends Controller{
        // fonction appelée par défaut
        public function Index(){
            $this->LoadModel("HomePotd");
            $potd = $this->HomePotd->FindPotd();
            $this->Render('home', compact('potd'));
        }
    }
?>