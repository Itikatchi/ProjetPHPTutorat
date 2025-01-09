<?php
namespace Controller;

use BO\Etudiant;
use DAO\Bilan1DAO;
use DAO\Bilan2DAO;
use DAO\EntrepriseDAO;
use DAO\EtduiantDAO;
use DAO\MaitreApprentissageDAO;
use DAO\SpecialiteDAO;
use DAO\TuteurDAO;
use DAO\ClasseDAO;
use DAO\AdministrateurDAO;
use DAO\AlerteDAO;

use BO\Tuteur;
use BO\Specialite;
use BO\Entreprise;
use BO\MaitreApprentissage;
use BO\Classe;
use BO\Administrateur;
use BO\Bilan1;
use BO\Bilan2;
use DateTime;

use BO\Alerte;
require_once "../BDDManager.php";

require_once "../DAO/Bilan2DAO.php";
require_once "../DAO/Bilan1DAO.php";
require_once "../DAO/SpecialiteDAO.php";
require_once "../DAO/MaitreApprentissageDAO.php";
require_once "../DAO/EntrepriseDAO.php";
require_once "../DAO/AdministrateurDAO.php";
require_once "../DAO/TuteurDAO.php";
require_once "../DAO/ClasseDAO.php";
require_once "../DAO/AlerteDAO.php";


require_once "../BO/Bilan2.php";
require_once "../BO/Bilan1.php";
require_once "../BO/Specialite.php";
require_once "../BO/MaitreApprentissage.php";
require_once "../BO/Entreprise.php";
require_once "../BO/Administrateur.php";
require_once "../BO/Tuteur.php";
require_once "../BO/Classe.php";
require_once "../BO/Alerte.php";

class EtudiantController
{
    public function dashboard()
    {
        try {
            $this->ensureLoggedInAs('etudiant');

            $prenom = ($_SESSION['Prenom'] ?? "");
            $nom = ($_SESSION['Nom'] ?? "");

            include "../Views/Nav/NavEtudiant.php";
            include "../Views/PageAccueilEtudiant.php";
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

    public function mesinfo()
    {
        try {
            $this->ensureLoggedInAs('etudiant');
            $logetu = $_SESSION['id'];

            $bdd = initialiseConnexionBDD();
            $etu = new EtduiantDAO($bdd);
            $etudiant = $etu->find($logetu);

            include "../Views/Nav/NavEtudiant.php";
            include "../Views/MesInformationsEtudiant.php";
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }

    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_unset();
        session_destroy();

        header("Location: ../../index.php");
        exit;
    }

    public function bilans()
    {
        try {
            $this->ensureLoggedInAs('etudiant');
            $logetu = $_SESSION['id'];

            $bdd = initialiseConnexionBDD();
            $etuDAO = new EtduiantDAO($bdd);
            $etudiant = $etuDAO->find($logetu);

            include "../Views/Nav/NavEtudiant.php";
            include "../Views/PageBilanPourEtudiant.php";
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }

}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller = new EtudiantController();
    try {
        switch ($_GET['action']) {
            case 'dashboard':
                $controller->dashboard();
                break;

            case 'mesinfo':
                $controller->mesinfo();
                break;
            case 'logout':
                $controller->logout();
                break;
            case 'bilan':
                $controller->bilans();
                break;

            default:
                throw new \Exception("Action inconnue : " . htmlspecialchars($_GET['action']));
        }} catch (\Exception $e) {


        header("Location: ../../index.php?error=" . urlencode("Erreur inattendue : " . $e->getMessage()));
        exit;
    }

    exit;
}
