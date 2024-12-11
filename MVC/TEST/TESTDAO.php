<?php

namespace TEST;



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

use BO\Tuteur;
use BO\Specialite;
use BO\Entreprise;
use BO\MaitreApprentissage;
use BO\Classe;
use BO\Administrateur;
use BO\Bilan1;
use BO\Bilan2;
use DateTime;


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

/*
echo '------------------------------------ Entreprise -------------------------------';

$bdd = initialiseConnexionBDD();
$entDao = new EntrepriseDAO($bdd);
var_dump($entDao);

var_dump($entDao->find(1));
var_dump($entDao->getAll());

$Entrepise1 = new Entreprise(0,"Youtube","19 Avenue du 8 Mai 1945","69960","Corbas");
$test = $entDao->create($Entrepise1);
var_dump($test);
$Entrepise2 = new Entreprise(0,"YannCorp","19 Avenue du 8 Mai 1945","69960","Corbas");
$test2 = $entDao->update($Entrepise2);
var_dump($test2);
$test3 = $entDao->delete($Entrepise2);
var_dump($test3);

*/
echo '------------------------------------ Tuteur -------------------------------';
$bdd = initialiseConnexionBDD();
$tuteurDao = new TuteurDAO($bdd);
var_dump($tuteurDao);
$tut = $tuteurDao->authentification("marie.curie@example.com","password123");
var_dump($tut);
/*
var_dump($tuteurDao->find(1));

var_dump($tuteurDao->getAll());
$tuteur1 = new Tuteur("0768751233",1,0,"Patoche","Maximax","Maximax@gmail.com","root");
$test = $tuteurDao->create($tuteur1);
var_dump($test);
$tuteur2 = new Tuteur("0768751233",3,10,"Roux","Maximax","Maximax@gmail.com","root");
$test2 = $tuteurDao->update($tuteur2);
var_dump($test2);
$test3 = $tuteurDao->delete($tuteur2);
var_dump($test3);
echo '------------------------------------ Specialité -------------------------------';
*/
/*
$bdd = initialiseConnexionBDD();
$specialDao = new SpecialiteDAO($bdd);
var_dump($specialDao);
var_dump($specialDao->find(1));
var_dump($specialDao->getAll());
$tuteur1 = new Specialite(0,"Maths");
$test = $specialDao->create($tuteur1);
var_dump($test);
$tuteur2 = new Specialite(5,"Mathematique");
$test2 = $specialDao->update($tuteur2);
var_dump($test2);
$test3 = $specialDao->delete($tuteur2);
var_dump($test3);
*/
/*
echo '------------------------------------ MaitreApprentissage -------------------------------';

$bdd = initialiseConnexionBDD();
$maitreApprDao = new MaitreApprentissageDAO($bdd);
var_dump($maitreApprDao);

var_dump($maitreApprDao->find(1));
var_dump($maitreApprDao->getAll());
$entDao = new EntrepriseDAO($bdd);
$entreprise = ($entDao->find(1));
$Maitreapp1 = new MaitreApprentissage(0,"Alp","Fred","0664092320","diegofred@gmail.com",$entreprise);
$test = $maitreApprDao->create($Maitreapp1);
var_dump($test);
$Maitreapp2 = new MaitreApprentissage(10,"Alp","Charle","0664092320","diegofred@gmail.com",$entreprise);
$test2 = $maitreApprDao->update($Maitreapp2);
var_dump($test2);
$test3 = $maitreApprDao->delete($Maitreapp2);
var_dump($test3);
*/
/*
echo '------------------------------------ Classe -------------------------------';
$bdd = initialiseConnexionBDD();
$ClasseDAO = new ClasseDAO($bdd);
var_dump($ClasseDAO);
$cla1 = ($ClasseDAO->find(1));
var_dump($ClasseDAO->getAll());

$test4 = $ClasseDAO->delete($cla1);
var_dump($test4);
/*
$classe1 = new Classe(0,"Alp");
$test = $ClasseDAO->create($classe1);
var_dump($test);
$classe2 = new Classe(4,"chevale");
$test2 = $ClasseDAO->update($classe2);
var_dump($test2);
$test3 = $ClasseDAO->delete($classe2);
var_dump($test3);
*/
/*
echo '------------------------------------ Admin -------------------------------';
$bdd = initialiseConnexionBDD();
$AdminDAO = new AdministrateurDAO($bdd);
$admin = $AdminDAO->authentification("sysadmin@example.com","syssecure");
var_dump($admin);
/*var_dump($AdminDAO);
$cla1 = ($AdminDAO->find(2));
var_dump($cla1);
var_dump($AdminDAO->getAll());


$classe1 = new Administrateur(0,"Monsieur2","Admin3","Admin@gmail.com","adminoo");
$test = $AdminDAO->create($classe1);
var_dump($test);

$classe2 = new Administrateur(3,"chevale","Admin3","Admin@gmail.com","adminoo");
$test2 = $AdminDAO->update($classe2);
var_dump($test2);
$test3 = $AdminDAO->delete($cla1);
var_dump($test3);

/*
echo '------------------------------------ Bilan1 -------------------------------';
$bdd = initialiseConnexionBDD();
$Bilan1Dao = new Bilan1DAO($bdd);
var_dump($Bilan1Dao);
$etudiant = new EtduiantDAO($bdd);
$etu = $etudiant->find(2);
$bilan1 = $Bilan1Dao->getallBilan1ByEleve($etu);
var_dump($bilan1);
$bilan2 = $Bilan1Dao->getAll();
var_dump($bilan2);
var_dump("--------------");
/*
$date = new DateTime('now');
$bil1 = new Bilan1(17,$date,0,"Une vrai remarque", 2, 20, $etu);
$bilan3 = $Bilan1Dao->create($bil1);
var_dump($bilan3);

//$bil1 = $Bilan1Dao->find(6);
$date = new DateTime('now');
$bil2 = new Bilan1(17,$date,8,"Une vrai remar", 2, 20, $etu);
$bilan3 = $Bilan1Dao->update($bil2);
var_dump($bilan3);




echo '------------------------------------ Bilan2 -------------------------------';
$bdd = initialiseConnexionBDD();
$Bilan2DAo = new Bilan2DAO($bdd);
var_dump($Bilan2DAo);
$bilan1 = $Bilan2DAo->find(5);
$bil = $Bilan2DAo->delete($bilan1);
var_dump($bil);
/*

$bilan1 = $Bilan2DAo->getallBilan2ByEleve($etu);
var_dump($bilan1);

$etudiant = new EtduiantDAO($bdd);
$etu = $etudiant->find(5);

$date = new DateTime('now');
$bil1 = new Bilan2("Les chauves ",$date,0,"Une vrai remarque", 2, 20, $etu);
$bilan3 = $Bilan2DAo->create($bil1);
var_dump($bilan3);
$bil2 = new Bilan2("Maxime homo sapiens ou homo herectus",$date,4,"Une vrai remar", 2, 20, $etu);
$bilan3 = $Bilan2DAo->update($bil2);
var_dump($bilan3);


echo '------------------------------------ Etudiant -------------------------------';
$bdd = initialiseConnexionBDD();
$EtudiantDAO = new EtduiantDAO($bdd);
var_dump($EtudiantDAO);
$stud = $EtudiantDAO->authentification("a@a","test");
var_dump($stud);
/*
$spec1 = $EtudiantDAO->find(1);
//var_dump($EtudiantDAO->getAll());
$test1 = $EtudiantDAO->delete($spec1);
$student = new Etudiant();
var_dump($test1);
*/