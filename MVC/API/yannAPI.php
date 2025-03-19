<?php
namespace API;

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
$bdd  = initialiseConnexionBDD();
function JsonEnvoie($status, $data = null)
{
    header('Content-type: application/json');
    echo (json_encode(['status' => $status, 'data' => $data]));
    exit;
}
if(!isset($_POST['email'])& !isset( $_POST['mdp'])){
    $data = "Mail ou mot de passe incorrect";
    jsonEnvoie("erreur", $data);
}else {
    $Etudiant = new EtduiantDAO($bdd);
    $obj = $Etudiant->authentification($_POST['email'], $_POST['mdp']);
    $Bilan1 = new Bilan1DAO($bdd);
    $Bilan2 = new Bilan2DAO($bdd);
    $bil1 = $Bilan1->getallBilan1ByEleve($obj);
    $bil2 = $Bilan2->getallBilan2ByEleve($obj);

    // Récupérer le dernier bilan (s'il existe) ou null
    $bilanfinale1 = !empty($bil1) ? end($bil1) : null;
    $bilanfinale2 = !empty($bil2) ? end($bil2) : null;

    $dateString1 = ($bilanfinale1 && $bilanfinale1->getDatVisEnt() instanceof DateTime) ?
        $bilanfinale1->getDatVisEnt()->format('Y-m-d H:i:s') : 'Pas de bilan1';

    $dateString2 = ($bilanfinale2 && $bilanfinale2->getDatBil2() instanceof DateTime) ?
        $bilanfinale2->getDatBil2()->format('Y-m-d H:i:s') : 'Pas de bilan2';

    $data = [
        'nom' => $obj->getNomUti() ?? '',
        'prenom' => $obj->getPrenomUti() ?? '',
        'mot_de_passe' => $obj->getMdpUti() ?? '',
        'telephone' => $obj->getEtuTel() ?? '',
        'email' => $obj->getEmailUti() ?? '',
        'adresse' => $obj->getEtuAdr() ?? '',
        'code_postal' => $obj->getEtuCp() ?? '',
        'ville' => $obj->getEtuVille() ?? '',
        'specialite' => $obj->getMaSpec()->getNomSpec() ?? '',
        'classe' => $obj->getMaClasse()->getNomCla() ?? '',

        // Entreprise
        'entreprise_nom' => $obj->getMonEnt()->getNomEnt() ?? 'Pas d\'entreprise',
        'entreprise_cp' => $obj->getMonEnt()->getCpEnt() ?? 'Pas d\'entreprise',
        'entreprise_adresse' => $obj->getMonEnt()->getAdrEnt() ?? 'Pas d\'entreprise',
        'entreprise_ville' => $obj->getMonEnt()->getVilEnt() ?? 'Pas d\'entreprise',

        // Maître d'apprentissage
        'maitre_prenom' => $obj->getMonMaitreAp()?->getPreMaiAppr() ?? 'Pas de maitre_apprentissage',
        'maitre_nom' => $obj->getMonMaitreAp()?->getNomMaiAppr() ?? 'Pas de maitre_apprentissage',
        'maitre_email' => $obj->getMonMaitreAp()?->getMailMaiAppr() ?? 'Pas de maitre_apprentissage',
        'maitre_telephone' => $obj->getMonMaitreAp()?->getTelMaiAppr() ?? 'Pas de maitre_apprentissage',

        // Tuteur
        'tuteur_prenom' => $obj->getMonTuteur()?->getPrenomUti() ?? 'Pas de tuteur',
        'tuteur_nom' => $obj->getMonTuteur()?->getNomUti() ?? 'Pas de tuteur',
        'tuteur_email' => $obj->getMonTuteur()?->getEmailUti() ?? 'Pas de tuteur',
        'tuteur_telephone' => $obj->getMonTuteur()?->getTutTel() ?? 'Pas de tuteur',

        // Bilan 1
        'bilan1_note_entreprise' => $bilanfinale1?->getNotEnt() ?? 'Pas de bilan1',
        'bilan1_note_dossier' => $bilanfinale1?->getNotDosBil() ?? 'Pas de bilan1',
        'bilan1_note_oral' => $bilanfinale1?->getNotOraBil() ?? 'Pas de bilan1',
        'bilan1_remarque' => $bilanfinale1?->getRemBil() ?? 'Pas de bilan1',
        'bilan1_date' => $dateString1,

        // Bilan 2
        'bilan2_note_dossier' => $bilanfinale2?->getNotDosBil() ?? 'Pas de bilan2',
        'bilan2_note_oral' => $bilanfinale2?->getNotOraBil() ?? 'Pas de bilan2',
        'bilan2_sujet' => $bilanfinale2?->getSujBil() ?? 'Pas de bilan2',
        'bilan2_date' => $dateString2,
    ];

    jsonEnvoie("ok", $data);
}