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

require_once "../Controller/AdministrateurController.php";

class AdministrateurController
{
    public function dashboard()
    {
        try {
            $this->ensureLoggedInAs('administrateur');

            $prenom = htmlspecialchars($_SESSION['Prenom'] ?? "", ENT_QUOTES, 'UTF-8');
            $nom = htmlspecialchars($_SESSION['Nom'] ?? "", ENT_QUOTES, 'UTF-8');

            include "../Views/Nav/NavAdmin.php";
            include "../Views/PageAccueilAdministrateur.php";
        } catch (\Exception $e) {

            $this->redirectWithError($e->getMessage());
        }
    }
    public function listeEtudiants()
    {
        try {
            $this->ensureLoggedInAs('administrateur');

            $bdd = initialiseConnexionBDD();
            $etudiantsDAO = new EtduiantDAO($bdd);
            $etudiants = $etudiantsDAO->getAll();


            include "../Views/Nav/NavAdmin.php";
            include "../Views/PageListeEtudiant.php";
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }


    private function ensureLoggedInAs($role)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }


        if (!isset($_SESSION['role']) || $_SESSION['role'] !== $role) {
            throw new \Exception("Vous devez être connecté en tant que $role pour accéder à cette page.");
        }
    }

    private function redirectWithError($message)
    {

        header("Location: ../../index.php?error=" . urlencode($message));
        exit;
    }

}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller = new AdministrateurController();

    try {
        switch ($_GET['action']) {
            case 'dashboard':
                $controller->dashboard();
                break;

            case 'listeetudiants':
                $controller->listeEtudiants();
                break;

            default:
                throw new \Exception("Action inconnue : " . htmlspecialchars($_GET['action']));
        }
    } catch (\Exception $e) {
        header("Location: ../../index.php?error=" . urlencode("Erreur inattendue : " . $e->getMessage()));
        exit;
    }
}

