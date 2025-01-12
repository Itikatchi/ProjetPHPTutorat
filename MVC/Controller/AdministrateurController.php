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

    public function mesinfo()
    {
        try {
            $this->ensureLoggedInAs('administrateur');
            $logtut = $_SESSION['id'];

            $bdd = initialiseConnexionBDD();
            $adminDAO = new AdministrateurDAO($bdd);
            $admin = $adminDAO->find($logtut);

            include "../Views/Nav/NavAdmin.php";
            include "../Views/MesInformationsAdmin.php";
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }

    public function modifierInfos()
    {
        try {
            $this->ensureLoggedInAs('administrateur');
            $logtut = $_SESSION['id'];

            $bdd = initialiseConnexionBDD();
            $adminDAO = new AdministrateurDAO($bdd);
            $admin = $adminDAO->find($logtut);

            if (!$admin) {
                throw new \Exception("Admin non trouvé.");
            }
            include "../Views/Nav/NavAdmin.php";
            include "../Views/ModifierInformationsAdmin.php";
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }
///////////////////////////////////////////MODIFIER LES BILAN 1////////////////////////////////////
    public function modifierBilan1($id)
    {
        try {
            $this->ensureLoggedInAs('administrateur');
            $bdd = initialiseConnexionBDD();
            $bilan1dao = new Bilan1DAO($bdd);
            $bilan1 = $bilan1dao->find($id);
            if (!$bilan1) {
                throw new \Exception("Bilan1 non trouvé.");
            }
            include "../Views/Nav/NavAdmin.php";
            include "../Views/PageCreationBilan1.php";
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }

    public function saveModifBilan1($id)
    {
        echo "Méthode saveInfos appelée";
        try {
            $this->ensureLoggedInAs('administrateur');



            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $dateVisEnt = htmlspecialchars($_POST['dateVisEnt']);
                $noteEnt = floatval($_POST['noteEnt']);
                $noteDos = floatval($_POST['noteDos']);
                $noteOra = floatval($_POST['noteOra']);
                $remarque = htmlspecialchars($_POST['remarque']);

                $bdd = initialiseConnexionBDD();
                $bilan1dao = new Bilan1DAO($bdd);
                $bilan1 = $bilan1dao->find($id);

                if (!$bilan1) {
                    throw new \Exception("Tuteur non trouvé.");
                }

                $bilan1->setNotEnt($noteEnt);
                $bilan1->setNotOraBil($noteOra);
                $bilan1->setNotDosBil($noteDos);
                $bilan1->setRemBil($remarque);
                $bilan1->setDatVisEnt(new DateTime($dateVisEnt));

                $success = $bilan1dao->update($bilan1);

                if (!$success) {
                    throw new \Exception("La mise à jour des informations a échoué.");
                }
                var_dump($success);
                header("Location: ?action=detailBilan1&id=" . $id);
                exit;
            } else {
                throw new \Exception("Méthode invalide.");
            }
        } catch (\Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    ///////////////////////////////////////////MODIFIER LES BILAN 2////////////////////////////////////
    public function modifierBilan2($id)
    {
        try {
            $this->ensureLoggedInAs('administrateur');
            $bdd = initialiseConnexionBDD();
            $bilan2dao = new Bilan2DAO($bdd);
            $bilan2 = $bilan2dao->find($id);
            if (!$bilan2) {
                throw new \Exception("Bilan2 non trouvé.");
            }
            include "../Views/Nav/NavAdmin.php";
            include "../Views/PageCreationBilan2.php";
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }

    public function saveModifBilan2($id)
    {
        echo "Méthode saveInfos appelée";
        try {
            $this->ensureLoggedInAs('administrateur');



            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $dateBil2 = htmlspecialchars($_POST['dateBil2']);
                $sujetBil = htmlspecialchars($_POST['sujetMemoire']);
                $noteDos = floatval($_POST['noteDos']);
                $noteOra = floatval($_POST['noteOra']);
                $remarque = htmlspecialchars($_POST['remarque']);

                $bdd = initialiseConnexionBDD();
                $bilan2dao = new Bilan2DAO($bdd);
                $bilan2 = $bilan2dao->find($id);

                if (!$bilan2) {
                    throw new \Exception("Tuteur non trouvé.");
                }

                $bilan2->setSujBil($sujetBil);
                $bilan2->setNotOraBil($noteOra);
                $bilan2->setNotDosBil($noteDos);
                $bilan2->setRemBil($remarque);
                $bilan2->setDatBil2(new DateTime($dateBil2));

                $success = $bilan2dao->update($bilan2);

                if (!$success) {
                    throw new \Exception("La mise à jour des informations a échoué.");
                }
                var_dump($success);
                header("Location: ?action=detailBilan2&id=" . $id);
                exit;
            } else {
                throw new \Exception("Méthode invalide.");
            }
        } catch (\Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    public function saveInfos()
    {
        echo "Méthode saveInfos appelée";


        try {
            $this->ensureLoggedInAs('administrateur');

            $logtut = $_SESSION['id'];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $email = htmlspecialchars($_POST['email']);

                $bdd = initialiseConnexionBDD();
                $adminDAO = new AdministrateurDAO($bdd);
                $admin = $adminDAO->find($logtut);

                if (!$admin) {
                    throw new \Exception("Tuteur non trouvé.");
                }

                $admin->setNomUti($nom);
                $admin->setPrenomUti($prenom);
                $admin->setEmailUti($email);

                $success = $adminDAO->update($admin);

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
            $this->ensureLoggedInAs('administrateur');
            include "../Views/Nav/NavAdmin.php";
            include "../Views/ModifierMotDePasseAdmin.php";
        } catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }

    public function saveMdp()
    {
        try {
            $this->ensureLoggedInAs('administrateur');
            $logtut = $_SESSION['id'];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $ancienMdp = htmlspecialchars($_POST['old_password']);
                $nouveauMdp = htmlspecialchars($_POST['new_password']);

                $bdd = initialiseConnexionBDD();
                $AdminDAO = new AdministrateurDAO($bdd);
                $admin = $AdminDAO->find($logtut);

                if (!$admin) {
                    throw new \Exception("Tuteur non trouvé.");
                }

                if ($admin->getMdpUti() !== $ancienMdp) {
                    throw new \Exception("L'ancien mot de passe est incorrect.");
                }

                $admin->setMdpUti($nouveauMdp);
                $success = $AdminDAO->update($admin);

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
    public function CreatBil1($id)
    {
        try {
            $this->ensureLoggedInAs('administrateur');
            $bdd = initialiseConnexionBDD();
            $etudiantsDAO = new EtduiantDAO($bdd);
            $etudiant = $etudiantsDAO->find($id);
            $bil1DAO = new Bilan1DAO($bdd);

            $bil1 = new Bilan1(null, null, 0, null, null, null, $etudiant);
            $bil1DAO->create($bil1);
            header("Location:./AdministrateurController.php?action=bilanetud&id=$id");
        }
        catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }
    public function CreatBil2($id)
    {
        try {
            $this->ensureLoggedInAs('administrateur');
            $bdd = initialiseConnexionBDD();
            $etudiantsDAO = new EtduiantDAO($bdd);
            $etudiant = $etudiantsDAO->find($id);
            $bil2DAO = new Bilan2DAO($bdd);

            $bil2 = new Bilan2(null, null, 0, null, null, null  , $etudiant);
            $bil2DAO->create($bil2);
            header("Location:./AdministrateurController.php?action=bilanetud&id=$id");
        }
        catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }
    public function delBilan1(int $id)
    {
        try {
            $this->ensureLoggedInAs('administrateur');
            $bdd = initialiseConnexionBDD();

            $bil1DAO = new Bilan1DAO($bdd);
            $bilan1 = $bil1DAO->find($id);
            $idredirect = $bilan1->getMonEtu()->getIdUti();
            $bil1DAO->delete($bilan1);
            header("Location:./AdministrateurController.php?action=bilanetud&id=$idredirect");
        }
        catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }

    public function delBilan2(int $id)
    {
        try {
            $this->ensureLoggedInAs('administrateur');
            $bdd = initialiseConnexionBDD();

            $bil2DAO = new Bilan2DAO($bdd);
            $bilan2 = $bil2DAO->find($id);
            $idredirect = $bilan2->getMonEtu()->getIdUti();
            $bil2DAO->delete($bilan2);
            header("Location:./AdministrateurController.php?action=bilanetud&id=$idredirect");
        }
        catch (\Exception $e) {
            $this->redirectWithError($e->getMessage());
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





    public function modifierInfosEtu($id)
    {
        try {
            $this->ensureLoggedInAs('administrateur');

            $bdd = initialiseConnexionBDD();

            $etuDAO = new EtduiantDAO($bdd);
            $etudiant = $etuDAO->find($id);

            $specialiteDAO = new SpecialiteDAO($bdd);
            $maitreDao = new MaitreApprentissageDAO($bdd);
            $classeDAO = new ClasseDAO($bdd);
            $tuteurDAO = new TuteurDAO($bdd);
            $entrepriseDAO = new EntrepriseDAO($bdd);

            $maitres= $maitreDao->getAll();
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
    public function saveInfosEtu($id)
    {
        echo "Méthode saveInfos appelée";

        try {
            $this->ensureLoggedInAs('administrateur');


            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $telephone = htmlspecialchars($_POST['telephone']);
                $email = htmlspecialchars($_POST['email']);
                $adresse = htmlspecialchars($_POST['adresse']);
                $cp = htmlspecialchars($_POST['cp']);
                $ville = htmlspecialchars($_POST['ville']);
                $specialite = intval($_POST['specialite']);
                $classe = intval($_POST['classe']);
                $bdd = initialiseConnexionBDD();
                $etuDAO = new EtduiantDAO($bdd);
                $etudiant = $etuDAO->find($id);

                if($_POST['entreprise'] == ''){
                    $entreprise = null;
                    $etudiant->setMonEnt($entreprise);
                }else{
                    $entreprise = htmlspecialchars($_POST['entreprise']);
                    $entrepriseDAO = new EntrepriseDAO($bdd);
                    $entrepriseobj = $entrepriseDAO->find($entreprise);
                    $etudiant->setMonEnt($entrepriseobj);
                }

                if($_POST['tuteur'] == ""){
                    $tuteur = null;
                    $etudiant->setMonTuteur($tuteur);
                }else{
                    $tuteur = htmlspecialchars($_POST['tuteur']);
                    $tuteurDAO = new TuteurDAO($bdd);
                    $tuteurobj = $tuteurDAO->find($tuteur);
                    $etudiant->setMonTuteur($tuteurobj);
                }

                if($_POST['maitre-apprentissage'] == ""){
                    $maitre = null;
                    $etudiant->setMonMaitreAp($maitre);
                }else{
                    $maitre = htmlspecialchars($_POST['maitre-apprentissage']);
                    $maitreDAO = new MaitreApprentissageDAO($bdd);
                    $maitreobj = $maitreDAO->find($maitre);
                    $etudiant->setMonMaitreAp($maitreobj);
                }

                $specialiteDAO = new SpecialiteDAO($bdd);
                $specialiteobj = $specialiteDAO->find($specialite);
                $classeDAO = new ClasseDAO($bdd);
                $classeobj = $classeDAO->find($classe);




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
                $etudiant->setMaSpec($specialiteobj);
                $etudiant->setMaClasse($classeobj);




                $success = $etuDAO->update($etudiant);

                if (!$success) {
                    throw new \Exception("La mise à jour des informations a échoué.");
                }
                var_dump($success);
                header("Location: ?action=detail&id=" . $id);
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
    $controller = new AdministrateurController();

    try {
        switch ($_GET['action']) {
            case 'delBilan1':
                $id = intval($_GET['id']);
                $controller->delBilan1($id);
                break;
            case 'delBilan2':
                $id = intval($_GET['id']);
                $controller->delBilan2($id);
                break;
            case 'CreationduBil1':
                $id = intval($_GET['id']);
                $controller->creatBil1($id);
                break;
            case 'CreationduBil2':
                $id = intval($_GET['id']);
                $controller->creatBil2($id);
                break;
            case 'modifierBilan2':
                $id = intval($_GET['id']);
                $controller->modifierBilan2($id);
                break;
            case 'modifierBilan1':
                $id = intval($_GET['id']);
                $controller->modifierBilan1($id);
                break;
            case 'modifiermdp':
                $controller->modifierMdp();
                break;
            case 'modifierInfos':
                $controller->modifierInfos();
                break;
            case 'mesinfo':
                $controller->mesinfo();
                break;
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
            case 'modifierInfosEtu':
                $id = intval($_GET['id']);
                $controller->modifierInfosEtu($id);
                break;
            default:
                throw new \Exception("Action inconnue : " . htmlspecialchars($_GET['action']));
        }
    } catch (\Exception $e) {
        header("Location: ../../index.php?error=" . urlencode("Erreur inattendue : " . $e->getMessage()));
        exit;
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'CreatBilan1' && isset($_GET['id'])) {
    $controller = new AdministrateurController();
    $controller->saveModifBilan1($_GET['id']);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'CreatBilan2' && isset($_GET['id'])) {
    $controller = new AdministrateurController();
    $controller->saveModifBilan2($_GET['id']);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'saveinfoEtu' && isset($_GET['id'])) {
    $controller = new AdministrateurController();
    $controller->saveInfosEtu($_GET['id']);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'saveinfo') {
    $controller = new AdministrateurController();
    $controller->saveInfos();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'savemdp') {
    $controller = new AdministrateurController();
    $controller->saveMdp();
}


