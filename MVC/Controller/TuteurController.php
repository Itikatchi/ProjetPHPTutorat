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

class TuteurController
{
    public function dashboard()
    {
        try {
            $this->ensureLoggedInAs('tuteur');

            $prenom = htmlspecialchars($_SESSION['Prenom'] ?? "", ENT_QUOTES, 'UTF-8');
            $nom = htmlspecialchars($_SESSION['Nom'] ?? "", ENT_QUOTES, 'UTF-8');

            include "../Views/Nav/NavTuteur.php";
            include "../Views/PageAccueilTuteur.php";
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
    public function alerte()
    {
        try {
            $this->ensureLoggedInAs('tuteur');
            $logtut = $_SESSION['id'];

            $bdd = initialiseConnexionBDD();
            $tut = new TuteurDAO($bdd);
            $tuteur = $tut->find($logtut);
            $ale = new AlerteDAO($bdd);
            $alerte = $ale->getAllAl1ByTut($tuteur);
            $alerteDATE = $ale->find(1);
            $alerte2 = $ale->getAllAl2ByTut($tuteur);
            $alerte3 = $ale->getAllAl3ByTut($tuteur);



            include "../Views/Nav/NavTuteur.php";
            include "../Views/PageListeAlerteTuteur.php";
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }

    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller = new TuteurController();
    try {
        switch ($_GET['action']) {
            case 'dashboard':
                $controller->dashboard();
                break;

            case 'alerte':
                $controller->alerte();
                break;

            default:
                throw new \Exception("Action inconnue : " . htmlspecialchars($_GET['action']));
        }} catch (\Exception $e) {

        header("Location: ../../index.php?error=" . urlencode("Erreur inattendue : " . $e->getMessage()));
        exit;
    }

    exit;
}
