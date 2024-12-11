<?php

class LoginController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }


    public function login($email, $password) {

        $user = $this->model->getUser($email);

        if ($user) {

            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $user['role'];

                switch ($user['role']) {
                    case 'Etudiant':
                        header("Location: ../Views/PageAccueilEtudiant.php");
                        break;
                    case 'Tuteur':
                        header("Location: ../Views/PageAccueilTuteur.php");
                        break;
                    case 'Administrateur':
                        header("Location: ../Views/PageAccueilAdministrateur.php");
                        break;
                }
                exit;
            } else {
                return "Mot de passe incorrect.";
            }
        } else {
            return "Utilisateur non trouvé.";
        }
    }
}
?>