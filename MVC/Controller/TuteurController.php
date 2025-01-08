<?php
namespace Controller;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


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

    public function mesinfo()
    {
        try {
            $this->ensureLoggedInAs('tuteur');
            $logtut = $_SESSION['id'];

            $bdd = initialiseConnexionBDD();
            $tutDAO = new TuteurDAO($bdd);
            $tuteur = $tutDAO->find($logtut);

            include "../Views/Nav/NavTuteur.php";
            include "../Views/MesInformationsTuteur.php";
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

    public function listeetudiants()
    {
        try {
            $this->ensureLoggedInAs('tuteur');
            $logtut = $_SESSION['id'];

            $bdd = initialiseConnexionBDD();
            $tut = new TuteurDAO($bdd);
            $tuteur = $tut->find($logtut);

            $etudiantsDAO = new EtduiantDAO($bdd);
            $etudiants = $etudiantsDAO->getAllEtuByTut($tuteur);


            include "../Views/Nav/NavTuteur.php";
            include "../Views/PageListeEtudiant.php";
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }
    public function modifierInfos()
    {
        try {
            $this->ensureLoggedInAs('tuteur');
            $logtut = $_SESSION['id'];

            $bdd = initialiseConnexionBDD();
            $tutDAO = new TuteurDAO($bdd);
            $tuteur = $tutDAO->find($logtut);

            if (!$tuteur) {
                throw new \Exception("Tuteur non trouvé.");
            }
            include "../Views/Nav/NavTuteur.php";

            include "../Views/ModifierInformationsTuteur.php";
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }

    public function saveInfos()
    {
        echo "Méthode saveInfos appelée";


        try {
            $this->ensureLoggedInAs('tuteur');
            if (isset($_POST['cancel']) && $_POST['cancel'] === 'true') {
                header("Location: ?action=mesinfo");
                exit;
            }
                $logtut = $_SESSION['id'];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $telephone = htmlspecialchars($_POST['telephone']);
                $email = htmlspecialchars($_POST['email']);

                $bdd = initialiseConnexionBDD();
                $tutDAO = new TuteurDAO($bdd);
                $tuteur = $tutDAO->find($logtut);

                if (!$tuteur) {
                    throw new \Exception("Tuteur non trouvé.");
                }

                $tuteur->setNomUti($nom);
                $tuteur->setPrenomUti($prenom);
                $tuteur->setTutTel($telephone);
                $tuteur->setEmailUti($email);

                $success = $tutDAO->update($tuteur);

                if (!$success) {
                    throw new \Exception("La mise à jour des informations a échoué.");
                }
                var_dump($success);
                header("Location: ?action=mesinfo");
                exit;
            } else {
                throw new \Exception("Méthode invalide.");
            }
        } catch (\Exception $e) {
            echo "Erreur : " . $e->getMessage();
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

            case 'mesinfo':
                $controller->mesinfo();
                break;

            case 'listeetudiants':
                $controller->listeetudiants();
                break;

            case 'modifierinfos':
                $controller->modifierInfos();
                break;

            default:
                throw new \Exception("Action inconnue : " . htmlspecialchars($_GET['action']));
        }} catch (\Exception $e) {

        header("Location: ../../index.php?error=" . urlencode("Erreur inattendue : " . $e->getMessage()));
        exit;
    }

    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'saveinfo') {
    $controller = new TuteurController();
    $controller->saveInfos();
}
