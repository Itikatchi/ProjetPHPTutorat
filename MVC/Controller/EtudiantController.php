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

    public function modifierInfosEtu()
    {
        try {
            $this->ensureLoggedInAs('etudiant');
            $logetu = $_SESSION['id'];

            $bdd = initialiseConnexionBDD();
            $etuDAO = new EtduiantDAO($bdd);
            $etudiant = $etuDAO->find($logetu);

            if (!$etudiant) {
                throw new \Exception("Etudiant non trouvé.");
            }
            include "../Views/Nav/NavEtudiant.php";

            include "../Views/ModifierInformationsEtudiant.php";
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }

    public function saveInfosEtu()
    {
        echo "Méthode saveInfos appelée";

        try {
            $this->ensureLoggedInAs('etudiant');

            $logetu = $_SESSION['id'];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $telephone = htmlspecialchars($_POST['telephone']);
                $email = htmlspecialchars($_POST['email']);
                $adresse = htmlspecialchars($_POST['adresse']);
                $cp = htmlspecialchars($_POST['cp']);
                $ville = htmlspecialchars($_POST['ville']);

                $bdd = initialiseConnexionBDD();
                $etuDAO = new EtduiantDAO($bdd);
                $etudiant = $etuDAO->find($logetu);

                if (!$etudiant) {
                    throw new \Exception("Tuteur non trouvé.");
                }

                $etudiant->setNomUti($nom);
                $etudiant->setPrenomUti($prenom);
                $etudiant->setEtuTel($telephone);
                $etudiant->setEmailUti($email);
                $etudiant->setEtuAdr($adresse);
                $etudiant->setEtuCp($cp);
                $etudiant->setEtuVille($ville);

                $success = $etuDAO->update($etudiant);

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
    public function modifiermdpEtu()
    {
        try {
            $this->ensureLoggedInAs('etudiant');
            include "../Views/Nav/NavEtudiant.php";
            include "../Views/ModifierMotDePasseEtudiant.php";
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }

    public function saveMdpEtu()
    {
        var_dump($_POST['old_password']);
        var_dump($_POST['new_password']);
        try {
            $this->ensureLoggedInAs('etudiant');
            $logetu = $_SESSION['id'];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $ancienMdp = htmlspecialchars($_POST['old_password']);
                $nouveauMdp = htmlspecialchars($_POST['new_password']);

                $bdd = initialiseConnexionBDD();
                $etuDAO = new EtduiantDAO($bdd);
                $etudiant = $etuDAO->find($logetu);

                if (!$etudiant) {
                    throw new \Exception("Etudiant non trouvé.");
                    var_dump($etudiant);
                }

                if ($etudiant->getMdpUti() !== $ancienMdp) {
                    throw new \Exception("L'ancien mot de passe est incorrect.");
                    var_dump($etudiant);
                }

                $etudiant->setMdpUti($nouveauMdp);
                $success = $etuDAO->update($etudiant);

                if (!$success) {
                    throw new \Exception("La mise à jour du mot de passe a échoué.");
                    var_dump($etudiant);
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
    public function bilan()
    {

        try {
            $this->ensureLoggedInAs('etudiant');
            $logetu = $_SESSION['id'];
            $bdd = initialiseConnexionBDD();
            $etudiantsDAO = new EtduiantDAO($bdd);
            $etudiants = $etudiantsDAO->find($logetu);

            $Bilan1Dao = new Bilan1DAO($bdd);
            $bilan1 = $Bilan1Dao->getallBilan1ByEleve($etudiants);
            foreach ($bilan1 as $bilan) {
                if ($bilan->getDatVisEnt() != null) {
                    $bil1truefalse = true;
                }else{
                    $bil1truefalse = false;
                }
            }
            $Bilan2Dao = new Bilan2DAO($bdd);
            $bilan2 = $Bilan2Dao->getallBilan2ByEleve($etudiants);
            foreach ($bilan2 as $bilan) {
                if ($bilan->getDatBil2() != null) {
                    $bil2truefalse = true;
                    break;
                }else{
                    $bil2truefalse = false;
                }
            }
            include "../Views/Nav/NavEtudiant.php";
            include "../Views/PageBilanEtudiant.php";
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }
    public function detailBilan2($id)
    {
        try {
            $this->ensureLoggedInAs('etudiant');


            $bdd = initialiseConnexionBDD();

            $Bilan2Dao = new Bilan2DAO($bdd);
            $bilan2 = $Bilan2Dao->find($id);

            include "../Views/Nav/NavEtudiant.php";
            include "../Views/PageBilan2.php";
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }
    public function detailBilan1($id)
    {
        try {
            $this->ensureLoggedInAs('etudiant');
            $logetu = $_SESSION['id'];

            $bdd = initialiseConnexionBDD();

            $Bilan1Dao = new Bilan1DAO($bdd);
            $bilan1 = $Bilan1Dao->find($id);

            include "../Views/Nav/NavEtudiant.php";
            include "../Views/PageBilan1.php";
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
            case 'modifierInfosEtu';
                $controller->modifierInfosEtu();
                break;
            case 'modifiermdpEtu';
                $controller->modifiermdpEtu();
                break;
            case 'detailBilan2':
                $id = intval($_GET['id']);
                $controller->detailBilan2($id);
                break;
            case 'detailBilan1':
                $id = intval($_GET['id']);
                $controller->detailBilan1($id);
                break;
            case 'bilan':
                $controller->bilan();
                break;
            default:
                throw new \Exception("Action inconnue : " . htmlspecialchars($_GET['action']));
        }} catch (\Exception $e) {


        header("Location: ../../index.php?error=" . urlencode("Erreur inattendue : " . $e->getMessage()));
        exit;
    }

    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'saveinfoEtu') {
    $controller = new EtudiantController();
    $controller->saveInfosEtu();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'savemdpetu') {
    $controller = new EtudiantController();
    $controller->saveMdpEtu();
}