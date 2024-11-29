<?php

namespace TEST;



use DAO\Bilan1DAO;
use DAO\Bilan2DAO;
use DAO\EntrepriseDAO;
use DAO\EtduiantDAO;
use DAO\MaitreApprentissageDAO;
use DAO\SpecialiteDAO;
use DAO\TuteurDAO;
use DAO\ClasseDAO;
use DAO\AdministrateurDAO;

use BO\Tuteur;
use BO\Specialite;
use BO\Entreprise;
use BO\MaitreApprentissage;
use BO\Classe;
use BO\Administrateur;
use BO\Bilan1;
use BO\Bilan2;




//use ProjetPHPTutorat\MVC\DAO\AdministrateurDAO;
//use ProjetPHPTutorat\MVC\DAO\SpecialiteDAO;
//use ProjetPHPTutorat\MVC\DAO\MaitreApprentissageDAO;
//use ProjetPHPTutorat\MVC\DAO\TuteurDAO;


require_once "../BDDManager.php";

require_once "../DAO/Bilan2DAO.php";
require_once "../DAO/Bilan1DAO.php";
require_once "../DAO/SpecialiteDAO.php";
require_once "../DAO/MaitreApprentissageDAO.php";
require_once "../DAO/EntrepriseDAO.php";
require_once "../DAO/AdministrateurDAO.php";
require_once "../DAO/TuteurDAO.php";
require_once "../DAO/ClasseDAO.php";

require_once "../BO/Bilan2.php";
require_once "../BO/Bilan1.php";
require_once "../BO/Specialite.php";
require_once "../BO/MaitreApprentissage.php";
require_once "../BO/Entreprise.php";
require_once "../BO/Administrateur.php";
require_once "../BO/Tuteur.php";
require_once "../BO/Classe.php";

echo '------------------------------------ Entreprise -------------------------------';

$bdd = initialiseConnexionBDD();
$entDao = new EntrepriseDAO($bdd);
var_dump($entDao);

$spec1 = $entDao->find(1);

if ($spec1 != null) {
    echo $spec1->getNomEnt();
}
var_dump($entDao->getAll());
$Entrepise1 = new Entreprise(6,"Youtube","19 Avenue du 8 Mai 1945","69960","Corbas");
$test = $entDao->create($Entrepise1);
var_dump($test);
$Entrepise2 = new Entreprise(6,"YannCorp","19 Avenue du 8 Mai 1945","69960","Corbas");
$test2 = $entDao->update($Entrepise2);
var_dump($test2);
$test3 = $entDao->delete($Entrepise2);
var_dump($test3);
/*
echo '------------------------------------ Tuteur -------------------------------';
$bdd = initialiseConnexionBDD();
$tuteurDao = new TuteurDAO($bdd);
var_dump($tuteurDao);
//$spec = new Entreprise(5, "SDF",);
$spec1 = $tuteurDao->find(1);
//$tuteurDao->update($spec);
if ($spec1 != null) {
    echo $spec1->getNomUti();
}
var_dump($tuteurDao->getAll());
echo '------------------------------------ Specialité -------------------------------';

$bdd = initialiseConnexionBDD();
$specialDao = new SpecialiteDAO($bdd);
var_dump($specialDao);
//$spec = new Entreprise(5, "SDF",);
$spec1 = $specialDao->find(1);
//$specialDao->update($spec);
if ($spec1 != null) {
    echo $spec1->getNomSpec();
}
var_dump($specialDao->getAll());
echo '------------------------------------ MaitreApprentissage -------------------------------';
$bdd = initialiseConnexionBDD();
$maitreApprDao = new MaitreApprentissageDAO($bdd);
var_dump($maitreApprDao);
//$spec = new Entreprise(5, "SDF",);
$spec1 = $maitreApprDao->find(1);
//$maitreApprDao->update($spec);
if ($spec1 != null) {
    echo $spec1->getNomMaiAppr();
}
var_dump($maitreApprDao->getAll());
echo '------------------------------------ Classe -------------------------------';
$bdd = initialiseConnexionBDD();
$ClasseDAO = new ClasseDAO($bdd);
var_dump($ClasseDAO);
//$spec = new Entreprise(5, "SDF",);
$spec1 = $ClasseDAO->find(1);
//$ClasseDAO->update($spec);
if ($spec1 != null) {
    echo $spec1->getNomCla();
}
var_dump($ClasseDAO->getAll());
echo '------------------------------------ Admin -------------------------------';
$bdd = initialiseConnexionBDD();
$AdminDAO = new AdministrateurDAO($bdd);
var_dump($AdminDAO);
//$spec = new Entreprise(5, "SDF",);
$spec1 = $AdminDAO->find(1);
//$AdminDAO->update($spec);
if ($spec1 != null) {
    var_dump($spec1->getNomUti());
}
var_dump($AdminDAO->getAll());
echo '------------------------------------ Bilan1 -------------------------------';
$bdd = initialiseConnexionBDD();
$Bilan1DAo = new Bilan1DAO($bdd);
var_dump($Bilan1DAo);
$etudiantdao = new EtduiantDAO($bdd);
$etudiant = $etudiantdao->find(1);
//$spec = new Entreprise(5, "SDF",);
$spec1 = $Bilan1DAo->find(1);
var_dump($Bilan1DAo->getallBilan1ByEleve($etudiant));

echo '------------------------------------ Bilan2 -------------------------------';
$bdd = initialiseConnexionBDD();
$Bilan2DAo = new Bilan2DAO($bdd);
var_dump($Bilan2DAo);

$etudiantdao = new EtduiantDAO($bdd);
$etudiant = $etudiantdao->find(4);
//$spec = new Entreprise(5, "SDF",);
$spec1 = $Bilan2DAo->find(1);
var_dump($Bilan2DAo->getallBilan2ByEleve($etudiant));

echo '------------------------------------ Etudiant -------------------------------';
$bdd = initialiseConnexionBDD();
$EtudiantDAO = new EtduiantDAO($bdd);
var_dump($EtudiantDAO);
//$spec = new Entreprise(5, "SDF",);
$spec1 = $EtudiantDAO->find(1);
var_dump($EtudiantDAO->getAll());
*/