<?php
    class Login extends Model {
        // constructeur
        public function __construct() {
            $this->_table = "Customers";
            $this->GetConnection();
        }

        // ouverture de la session de l'utilisateur demandé
        public function FindByMail() {
            if (!empty($_POST)) {
                if (isset($_POST["cus_mail"], $_POST["cus_password"])
                    && !empty($_POST["cus_mail"]) && !empty($_POST["cus_password"])
                    ) {
                        $cus_mail = strip_tags($_POST["cus_mail"]);

                        if(!filter_var($cus_mail, FILTER_VALIDATE_EMAIL)) {
                            return("L'adresse email est incorrecte !");
                        }

                        $sql = "SELECT * FROM ".$this->_table." WHERE cus_mail = :mail";
                        $query = $this->_connection->prepare($sql);
                        $query->bindValue(":mail", $cus_mail, PDO::PARAM_STR);
                        $query->execute();
                        $user = $query->fetch(PDO::FETCH_OBJ);

                        if (!$user) {
                            return "Vous n'avez pas de compte !";
                        } else {
                            if (strip_tags($_POST["cus_password"]) == $user->cus_password) {
                                session_start();
                                $_SESSION["test"] = "test";
                                $_SESSION["user"] = [
                                    "ses_username" => $user->cus_username,
                                    "ses_mail" => $user->cus_mail,
                                    "ses_role" => $user->cus_role
                                ];
                                header("Location: /");
                            } else {
                                return "Votre mot de passe est incorrect !";
                            }
                        }
                } else {
                    return("Le formulaire est incomplet !");
                }
            }
        }

        // fermeture de la session en cours
        public function LeaveSession() {
            session_start();
            unset($_SESSION["user"]);
        }
    }
?>