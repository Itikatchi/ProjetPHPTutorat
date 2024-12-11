<?php
namespace Controller;


use DAO\EtduiantDAO;
use DAO\TuteurDAO;
use DAO\AdministrateurDAO;

require_once "../DAO/EtduiantDAO.php";
require_once "../BDDManager.php";
require_once "../DAO/TuteurDAO.php";
require_once "../BO/Tuteur.php";
require_once "../DAO/EntrepriseDAO.php";
require_once "../BO/Entreprise.php";
require_once "../BO/Specialite.php";
require_once "../DAO/SpecialiteDAO.php";
require_once "../BO/Classe.php";
require_once "../DAO/ClasseDAO.php";
require_once "../BO/MaitreApprentissage.php";
require_once "../DAO/MaitreApprentissageDAO.php";
require_once "../DAO/AdministrateurDAO.php";
require_once "../BO/Administrateur.php";

require_once "../Controller/EtudiantController.php";
require_once "../Controller/TuteurController.php";
require_once "../Controller/AdministrateurController.php";


class LoginController
{
    public function login($email, $password)
    {

        $bdd = initialiseConnexionBDD();
        if (!$bdd) {
            $this->redirectWithError("Impossible de se connecter à la base de données.");
        }

        $user = null;
        $role = null;

        try {

            $etudiantDAO = new EtduiantDAO($bdd);
            $user = $etudiantDAO->authentification($email, $password);
            if ($user) {
                $role = "etudiant";
            }

            if (!$user) {
                $tuteurDAO = new TuteurDAO($bdd);
                $user = $tuteurDAO->authentification($email, $password);
                if ($user) {
                    $role = "tuteur";
                }
            }

            if (!$user) {
                $administrateurDAO = new AdministrateurDAO($bdd);
                $user = $administrateurDAO->authentification($email, $password);
                if ($user) {
                    $role = "administrateur";
                }
            }
        } catch (\Exception $e) {
            $this->redirectWithError("Erreur lors de l'authentification : " . $e->getMessage());
        }


        if ($user && $role) {
            $this->startSession($user, $role);
        } else {
            $this->redirectWithError("Identifiants incorrects ou utilisateur introuvable.");
        }
    }

    private function startSession($user, $role)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }


        $_SESSION['id'] = $user->getIdUti();
        $_SESSION['Prenom'] = $user->getPrenomUti();
        $_SESSION['Nom'] = $user->getNomUti();
        $_SESSION['email'] = $user->getEmailUti();
        $_SESSION['role'] = $role;


        switch ($role) {
            case "etudiant":
                header("Location: ../Controller/EtudiantController.php?action=dashboard");
                break;
            case "tuteur":
                header("Location: ../Controller/TuteurController.php?action=dashboard");
                break;
            case "administrateur":
                header("Location: ../Controller/AdministrateurController.php?action=dashboard");
                break;
            default:
                $this->redirectWithError("Rôle utilisateur inconnu : " . htmlspecialchars($role));
        }
        exit;
    }

    private function redirectWithError($message)
    {
        // Redirection avec le message d'erreur
        header("Location: ../../index.php?error=" . urlencode($message));
        exit;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';


    if (empty($email)) {
        header("Location: ../../index.php?error=Le champ email est vide.");
        exit;
    }

    if (empty($password)) {
        header("Location: ../../index.php?error=Le champ mot de passe est vide.");
        exit;
    }


    $controller = new LoginController();
    $controller->login($email, $password);
} else {

    header("Location: ../../index.php?error=Requête non autorisée.");
    exit;
}
