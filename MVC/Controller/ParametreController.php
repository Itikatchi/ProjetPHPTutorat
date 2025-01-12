<?php
namespace Controller;


use DAO\AffectationTuteurClasseDAO;
use BO\AffectationTuteurClasse;
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
require_once "../DAO/AffectationTuteurClasseDAO.php";

require_once "../DAO/Bilan2DAO.php";
require_once "../DAO/Bilan1DAO.php";
require_once "../DAO/SpecialiteDAO.php";
require_once "../DAO/MaitreApprentissageDAO.php";
require_once "../DAO/EntrepriseDAO.php";
require_once "../DAO/AdministrateurDAO.php";
require_once "../DAO/TuteurDAO.php";
require_once "../DAO/ClasseDAO.php";
require_once "../DAO/AlerteDAO.php";

require_once "../BO/AffectationTuteurClasse.php";
require_once "../BO/Bilan2.php";
require_once "../BO/Bilan1.php";
require_once "../BO/Specialite.php";
require_once "../BO/MaitreApprentissage.php";
require_once "../BO/Entreprise.php";
require_once "../BO/Administrateur.php";
require_once "../BO/Tuteur.php";
require_once "../BO/Classe.php";
require_once "../BO/Alerte.php";
class ParametreController{
    private function redirectWithError($message)
    {

        header("Location: ../../index.php?error=" . urlencode($message));
        exit;
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
    public function parametrage()
    {
        try {
            $this->ensureLoggedInAs('administrateur');
            include "../Views/Nav/NavAdmin.php";
            include "../Views/PageParametreAdmin.php";
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }
    public function ajoutEtudiant()
    {
        try {
            $this->ensureLoggedInAs('administrateur');

            $bdd = initialiseConnexionBDD();
            $specialiteDAO = new SpecialiteDAO($bdd);
            $classeDAO = new ClasseDAO($bdd);

            $specialites = $specialiteDAO->getAll();
            $classes = $classeDAO->getAll();

            include "../Views/Nav/NavAdmin.php";
            include "../Views/PageAjoutEtudiant.php";
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }
    public function addEtudiant()
    {
        try {
            $this->ensureLoggedInAs('administrateur');

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $bdd = initialiseConnexionBDD();
                $etudiantDAO = new EtduiantDAO($bdd);

                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $email = htmlspecialchars($_POST['email']);
                $mdp = htmlspecialchars($_POST['mdp']);
                $tel = htmlspecialchars($_POST['tel']);
                $specialiteId = intval($_POST['specialite']);
                $classeId = intval($_POST['classe']);
                $adresse = htmlspecialchars($_POST['adresse']);
                $codePostal = htmlspecialchars($_POST['code_postal']);
                $ville = htmlspecialchars($_POST['ville']);

                $specialiteDAO = new SpecialiteDAO($bdd);
                $classeDAO = new ClasseDAO($bdd);

                $specialite = $specialiteDAO->find($specialiteId);
                $classe = $classeDAO->find($classeId);

                if (!$specialite || !$classe) {
                    throw new \Exception("Spécialité ou classe introuvable.");
                }

                $etudiant = new Etudiant(
                    null,
                    $specialite,
                    $classe,
                    null,
                    null,
                    0,
                    $nom,
                    $prenom,
                    $email,
                    $mdp,
                    $tel,
                    $adresse,
                    $ville,
                    $codePostal
                );

                $success = $etudiantDAO->create($etudiant);

                if ($success) {
                    header("Location: ../Controller/AdministrateurController.php?action=listeetudiants");
                    exit;
                } else {
                    throw new \Exception("Erreur lors de l'enregistrement.");
                }
            }
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }
    public function affectationTuteurClasse()
    {
        try {
            $this->ensureLoggedInAs('administrateur');

            $bdd = initialiseConnexionBDD();
            $tuteurDAO = new TuteurDAO($bdd);
            $classeDAO = new ClasseDAO($bdd);

            $tuteurs = $tuteurDAO->getAll(); // Récupère tous les tuteurs
            $classes = $classeDAO->getAll(); // Récupère toutes les classes
            include "../Views/Nav/NavAdmin.php";

            include "../Views/PageAffectationClasse.php"; // Vue du formulaire
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }
    public function saveAffectationTuteurClasse()
    {
        try {
            $this->ensureLoggedInAs('administrateur');

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $bdd = initialiseConnexionBDD();
                $tuteurDAO = new TuteurDAO($bdd);
                $classeDAO = new ClasseDAO($bdd);
                $affectationDAO = new AffectationTuteurClasseDAO($bdd);

                $tuteurId = intval($_POST['tuteur_id']);
                $classeId = intval($_POST['classe_id']);
                $nbMaxEtu = intval($_POST['nb_max_etu']); // Optionnel

                $tuteur = $tuteurDAO->find($tuteurId);
                $classe = $classeDAO->find($classeId);

                if ($tuteur && $classe) {
                    $affectation = new AffectationTuteurClasse($tuteur, $classe, $nbMaxEtu);
                    $success = $affectationDAO->create($affectation);

                    if ($success) {
                        header("Location: ?action=affectationTuteurClasse&success=1");
                        exit;
                    } else {
                        throw new \Exception("Erreur lors de l'enregistrement.");
                    }
                } else {
                    throw new \Exception("Tuteur ou classe introuvable.");
                }
            }
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }
    public function ajoutEntrperise()
    {
        try {
            $this->ensureLoggedInAs('administrateur');

            $bdd = initialiseConnexionBDD();
            $specialiteDAO = new SpecialiteDAO($bdd);
            $classeDAO = new ClasseDAO($bdd);

            $specialites = $specialiteDAO->getAll();
            $classes = $classeDAO->getAll();

            include "../Views/Nav/NavAdmin.php";
            include "../Views/PageAjoutEntreprise.php";
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }

    public function ajoutTuteur()
    {
        try {
            $this->ensureLoggedInAs('administrateur');

            $bdd = initialiseConnexionBDD();

            include "../Views/Nav/NavAdmin.php";
            include "../Views/PageAjoutTuteur.php";
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }
    public function addTuteur()
    {
        try {
            $this->ensureLoggedInAs('administrateur');

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $bdd = initialiseConnexionBDD();
                $tuteurDAO = new TuteurDAO($bdd);

                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $email = htmlspecialchars($_POST['email']);
                $mdp = htmlspecialchars($_POST['mdp']);
                $tel = htmlspecialchars($_POST['tel']);

                $tuteur = new Tuteur($tel, 0,0,$nom, $prenom, $email, $mdp);

                $success = $tuteurDAO->create($tuteur);

                if ($success) {
                    header("Location: ../Controller/ParametreController.php?action=parametrage");
                    exit;
                } else {
                    throw new \Exception("Erreur lors de l'enregistrement du tuteur.");
                }
            }
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }

}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller = new ParametreController();
    try {
        switch ($_GET['action']) {

            case 'parametrage':
                $controller->parametrage();
                break;
            case 'ajoutEtudiant':
                $controller->ajoutEtudiant();
                break;
            case 'affectationTuteurClasse':
                $controller->affectationTuteurClasse();
                break;
            case 'ajoutTuteur':
                $controller->ajoutTuteur();
                break;
            case 'ajoutEntreprise':
                $controller->ajoutEntrperise();
                break;
            default:
                throw new \Exception("Action inconnue : " . htmlspecialchars($_GET['action']));
        }
    } catch (\Exception $e) {
        header("Location: ../../index.php?error=" . urlencode("Erreur inattendue : " . $e->getMessage()));
        exit;
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'saveAffectationTuteurClasse') {
    $controller = new ParametreController();
    $controller->saveAffectationTuteurClasse();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] === 'addEtudiant') {
    $controller = new ParametreController();
    $controller->addEtudiant();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'addTuteur') {
    $controller = new ParametreController();
    $controller->addTuteur();
}