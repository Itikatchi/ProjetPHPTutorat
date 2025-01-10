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

    public function alerte()
    {
        try {
            $this->ensureLoggedInAs('administrateur');
            $logtut = $_SESSION['id'];

            $bdd = initialiseConnexionBDD();
            $tut = new TuteurDAO($bdd);
            $tuteur = $tut->find($logtut);
            $ale = new AlerteDAO($bdd);

            $alerteDATE = $ale->find(1);
            $alerte = $ale->getAllall1();
            $alerte2 = $ale->getAllall2();
            $alerte3 = $ale->getAllall3();


            include "../Views/Nav/NavAdmin.php";
            include "../Views/PageListeAlerteAdmin.php";
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
            include "../Views/PageListeEtudiantAdmin.php";
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

    public function details($id)
    {
        if (!$id) {
            throw new \Exception("Un ID valide est requis pour afficher les détails.");
        }
        try {
            $this->ensureLoggedInAs('administrateur');

            $bdd = initialiseConnexionBDD();
            $etudiantsDAO = new EtduiantDAO($bdd);
            $etudiant = $etudiantsDAO->find($id);


            include "../Views/Nav/NavAdmin.php";
            include "../Views/PageDetailEtudiant.php";
        } catch (\Exception $e) {

        }
    }

    public function bilanetud($id)
    {
        try {
            $this->ensureLoggedInAs('administrateur');

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
            include "../Views/Nav/NavAdmin.php";
            include "../Views/PageBilanEtudiant.php";
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }

    public function detailBilan1($id)
    {
        try {
            $this->ensureLoggedInAs('administrateur');

            $bdd = initialiseConnexionBDD();

            $Bilan1Dao = new Bilan1DAO($bdd);
            $bilan1 = $Bilan1Dao->find($id);

            include "../Views/Nav/NavAdmin.php";
            include "../Views/PageBilan1.php";
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }

    public function detailBilan2($id)
    {
        try {
            $this->ensureLoggedInAs('administrateur');

            $bdd = initialiseConnexionBDD();

            $Bilan2Dao = new Bilan2DAO($bdd);
            $bilan2 = $Bilan2Dao->find($id);


            include "../Views/Nav/NavAdmin.php";
            include "../Views/PageBilan2.php";
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
    public function modifierInfosEtu()
    {
        try {
            $this->ensureLoggedInAs('administrateur');
            $logetu = $_SESSION['id'];

            $bdd = initialiseConnexionBDD();
            $etuDAO = new EtduiantDAO($bdd);
            $etudiant = $etuDAO->find($logetu);
            $specialiteDAO = new SpecialiteDAO($bdd);
            $classeDAO = new ClasseDAO($bdd);
            $tuteurDAO = new TuteurDAO($bdd);
            $entrepriseDAO = new EntrepriseDAO($bdd);
            $entreprises = $entrepriseDAO->getAll();
            $tuteurs = $tuteurDAO->getAll();
            $specialites = $specialiteDAO->getAll();
            $classes = $classeDAO->getAll();

            if (!$etudiant) {
                throw new \Exception("Etudiant non trouvé.");
            }
            include "../Views/Nav/NavAdmin.php";
            include "../Views/PageModifInfoEtuTutAdmin.php";
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
                $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
                $tel = htmlspecialchars($_POST['tel']);
                $specialiteId = intval($_POST['specialite']);
                $classeId = intval($_POST['classe']);

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
                    null,
                    $nom,
                    $prenom,
                    $email,
                    $mdp,
                    $tel,
                    "",
                    "",
                    ""
                );

                $success = $etudiantDAO->create($etudiant);

                if ($success) {
                    header("Location: ?action=listeetudiants&success=1");
                    exit;
                } else {
                    throw new \Exception("Erreur lors de l'enregistrement.");
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
            case 'alerte':
                $controller->alerte();
                break;
            case 'detail':
                $id = intval($_GET['id']);
                $controller->details($id);
                break;
            case 'logout':
                $controller->logout();
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
            case 'ajoutEtudiant':
                $controller->ajoutEtudiant();
                break;
            case 'parametrage':
                $controller->parametrage();
                break;
            case 'affectationTuteurClasse':
                $controller->affectationTuteurClasse();
                break;
            case 'ajoutEntreprise':
                $controller->ajoutEntrperise();
                break;
            case 'modifierInfosEtu':
                $controller->modifierInfosEtu();
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
    $controller = new AdministrateurController();
    $controller->saveAffectationTuteurClasse();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] === 'addEtudiant') {
    $controller = new AdministrateurController();
    $controller->addEtudiant();
}



