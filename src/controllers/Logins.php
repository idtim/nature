<?php
    class Logins extends Controller{
        // fonction appelée par défaut
        public function Index(){
            $this->Render('connection');
        }

        public function Connection(){
            $this->LoadModel("Login");
            $message = $this->Login->FindByMail();
            $this->Render('connection', compact('message'));
        }
        
        public function Deconnection(){
            $this->LoadModel("Login");
            $this->Login->LeaveSession();
            $this->Render('connection');
        }
    }
?>