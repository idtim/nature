<?php
    class Customers extends Controller {
        // fonction appelée par défaut
        public function Index() {
            $this->LoadModel("Customer");
            $customers = $this->Customer->GetAll();
            $this->render('rootCustomers', compact('customers'));
        }
    }
?>