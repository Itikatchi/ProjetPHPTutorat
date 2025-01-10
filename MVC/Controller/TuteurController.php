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
            include "../Views/PageListeEtudiantAdmin.php";
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
    public function modifierMdp()
    {
        try {
            $this->ensureLoggedInAs('tuteur');
            include "../Views/Nav/NavTuteur.php";
            include "../Views/ModifierMotDePasseTuteur.php";
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }

    public function saveMdp()
    {
        try {
            $this->ensureLoggedInAs('tuteur');
            $logtut = $_SESSION['id'];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $ancienMdp = htmlspecialchars($_POST['old_password']);
                $nouveauMdp = htmlspecialchars($_POST['new_password']);

                $bdd = initialiseConnexionBDD();
                $tutDAO = new TuteurDAO($bdd);
                $tuteur = $tutDAO->find($logtut);

                if (!$tuteur) {
                    throw new \Exception("Tuteur non trouvé.");
                }

                if ($tuteur->getMdpUti() !== $ancienMdp) {
                    throw new \Exception("L'ancien mot de passe est incorrect.");
                }

                $tuteur->setMdpUti($nouveauMdp);
                $success = $tutDAO->update($tuteur);

                if (!$success) {
                    throw new \Exception("La mise à jour du mot de passe a échoué.");
                }

                header("Location: ?action=mesinfo");
                exit;
            } else {
                throw new \Exception("Méthode invalide.");
            }
        } catch (\Exception $e) {
            echo "Erreur : " . $e->getMessage();
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

    public function details($id)
    {
        if (!$id) {
            throw new \Exception("Un ID valide est requis pour afficher les détails.");
        }
        try {
            $this->ensureLoggedInAs('tuteur');

            $bdd = initialiseConnexionBDD();
            $etudiantsDAO = new EtduiantDAO($bdd);
            $etudiant = $etudiantsDAO->find($id);


            include "../Views/Nav/NavTuteur.php";
            include "../Views/PageDetailEtudiant.php";
        } catch (\Exception $e) {

        }
    }
    public function bilanetud($id)
    {
        try {
            $this->ensureLoggedInAs('tuteur');

            $bdd = initialiseConnexionBDD();
            $etudiantsDAO = new EtduiantDAO($bdd);
            $etudiants = $etudiantsDAO->find($id);

            $Bilan1Dao = new Bilan1DAO($bdd);
            $bilan1 = $Bilan1Dao->getallBilan1ByEleve($etudiants);
            foreach ($bilan1 as $bilan) {
                if ($bilan->getDatVisEnt() != null) {
                    $bil1truefalse = true;
                } else {
                    $bil1truefalse = false;
                }
            }
            $Bilan2Dao = new Bilan2DAO($bdd);
            $bilan2 = $Bilan2Dao->getallBilan2ByEleve($etudiants);
            foreach ($bilan2 as $bilan) {
                if ($bilan->getDatBil2() != null) {
                    $bil2truefalse = true;
                    break;
                } else {
                    $bil2truefalse = false;
                }
            }
            include "../Views/Nav/NavTuteur.php";
            include "../Views/PageBilanEtudiant.php";
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }

    public function detailBilan1($id)
    {
        try {
            $this->ensureLoggedInAs('tuteur');

            $bdd = initialiseConnexionBDD();

            $Bilan1Dao = new Bilan1DAO($bdd);
            $bilan1 = $Bilan1Dao->find($id);

            include "../Views/Nav/NavTuteur.php";
            include "../Views/PageBilan1.php";
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }

    public function detailBilan2($id)
    {
        try {
            $this->ensureLoggedInAs('tuteur');

            $bdd = initialiseConnexionBDD();

            $Bilan2Dao = new Bilan2DAO($bdd);
            $bilan2 = $Bilan2Dao->find($id);


            include "../Views/Nav/NavTuteur.php";
            include "../Views/PageBilan2.php";
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

            case 'mesinfo':
                $controller->mesinfo();
                break;

            case 'listeetudiants':
                $controller->listeetudiants();
                break;

            case 'modifierinfos':
                $controller->modifierInfos();
                break;

            case 'modifiermdp':
                $controller->modifierMdp();
                break;

            case 'logout':
                $controller->logout();
                break;
            case 'detail':
                $id = intval($_GET['id']);
                $controller->details($id);
                break;
            case 'bilanetud':
                $id = intval($_GET['id']);
                $controller->bilanetud($id);
                break;
            case 'detailBilan1':
                $id = intval($_GET['id']);
                $controller->detailBilan1($id);
                break;
            case 'detailBilan2':
                $id = intval($_GET['id']);
                $controller->detailBilan2($id);
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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'savemdp') {
    $controller = new TuteurController();
    $controller->saveMdp();
}