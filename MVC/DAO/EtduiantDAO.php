<?php
namespace ProjetPHPTutorat\MVC\DAO;

namespace DAO;

use BO\Etudiant;

use BO\Tuteur;
use PDO;
use PDOException;
use ProjetPHPTutorat\MVC\DAO\DAO;

require_once '../BO/Etudiant.php';
require_once 'DAO.php';
class EtduiantDAO extends DAO
{


    public function create($obj): bool
    {
        $result = false;
        if ($obj instanceof Etudiant) {
            $query = "INSERT INTO Etudiant(etu_nom,etu_pre,etu_mdp,etu_tel,etu_email,etu_adr,etu_cp,etu_ville,spe_id,classe_id,tut_id,ent_id,maitre_appr_id) VALUES(:etu_nom,:etu_pre,:etu_mdp,:etu_tel,:etu_email,:etu_adr,:etu_cp,:etu_ville,:spe_id,:classe_id,:tut_id,:ent_id,:maitre_appr_id))";
            $stmt = $this->bdd->prepare($query);
            $r = $stmt->execute([
                "etu_nom"=> $obj->getNomUti(),
                "etu_pre"=> $obj->getPrenomUti(),
                "etu_mdp"=> $obj->getMdpUti(),
                "etu_tel"=> $obj->getEtuTel(),
                "etu_email"=> $obj->getEmailUti(),
                "etu_adr"=> $obj->getEtuAdr(),
                "etu_cp"=> $obj->getEtuCp(),
                "etu_ville"=> $obj->getEtuVille(),
                "spe_id"=> $obj->getMaSpec()->setIdSpec(),
                "classe_id"=> $obj->getMaClasse()->getIdCla(),
                "tut_id"=> $obj->getMonTuteur()->getIdUti(),
                "ent_id"=> $obj->getMonEnt()->getIdEnt(),
                "maitre_appr_id"=> $obj->getMonMaitreAp()->getIdMaiAppr()

            ]);
            if ($r !== false) {
                $result = true;
            }
        }
        return $result;
    }

    public function delete($obj): bool
    {
        $result = false;
        if ($obj instanceof Etudiant) {
            $bil1 = new Bilan1DAO($this->bdd);
            $bil2 = new Bilan2DAO($this->bdd);
            if($bil2->getallBilan2ByEleve($obj) == null && $bil1->getallBilan1ByEleve($obj) == null) {
                var_dump("ça supp l'etudiant");
                $tmp = $this->find($obj->getIdUti());
                if ($tmp) {
                    if ($obj->getIdUti() == $tmp->getIdUti()) {
                        $query = "DELETE FROM Etudiant WHERE etu_id = :etu_id";
                        $stmt = $this->bdd->prepare($query);
                        $r = $stmt->execute([
                            "etu_id" => $obj->getIdUti()
                        ]);
                        if ($r !== false) {
                            $result = true;
                        }
                    }
                }
            }
            else{
                var_dump("ça suppr les bilan");
                $r1 = false;
                $r2 = false;
                $query = "DELETE FROM Bilan2 WHERE etu_id = :etu_id";
                $stmt = $this->bdd->prepare($query);
                $rbil1 = $stmt->execute([
                    "etu_id" => $obj->getIdUti()
                ]);
                if ($rbil1 !== false) {
                    $r1 = true;
                }
                $query = "DELETE FROM Bilan1 WHERE etu_id = :etu_id";
                $stmt = $this->bdd->prepare($query);
                $rbil2 = $stmt->execute([
                    "etu_id" => $obj->getIdUti()
                ]);
                if ($rbil2 !== false) {
                    $r2 = true;
                }
                if ($r1 !== false && $r2 !== false) {
                    $tmp = $this->find($obj->getIdUti());
                    if ($tmp) {
                        if ($obj->getIdUti() == $tmp->getIdUti()) {
                            $query = "DELETE FROM Etudiant WHERE etu_id = :etu_id";
                            $stmt = $this->bdd->prepare($query);
                            $r = $stmt->execute([
                                "etu_id" => $obj->getIdUti()
                            ]);
                            if ($r !== false) {
                                $result = true;
                            }
                        }
                    }
                }
            }


        }
        return $result;
    }

    public function update($obj): bool
    {
        $result = false;
        if ($obj instanceof Etudiant) {
            $tmp = $this->find($obj->getIdUti());
            if ($tmp !== null) {
                if ($obj->getIdUti() == $tmp->getIdUti()) {
                    $query = "UPDATE Etudiant SET etu_nom = :etu_nom, etu_pre = :etu_pre,etu_mdp = :etu_mdp, etu_tel = :etu_tel,etu_email = :etu_email,etu_adr = :etu_adr,etu_cp = :etu_cp, etu_ville = :etu_ville, spe_id = :spe_id, classe_id = :classe_id, tut_id = :tut_id, ent_id = :ent_id, maitre_appr_id = :maitre_appr_id WHERE etu_id = :etu_id";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        "etu_nom"=> $obj->getNomUti(),
                        "etu_pre"=> $obj->getPrenomUti(),
                        "etu_mdp"=> $obj->getMdpUti(),
                        "etu_tel"=> $obj->getEtuTel(),
                        "etu_email"=> $obj->getEmailUti(),
                        "etu_adr"=> $obj->getEtuAdr(),
                        "etu_cp"=> $obj->getEtuCp(),
                        "etu_ville"=> $obj->getEtuVille(),
                        "spe_id"=> $obj->getMaSpec()->setIdSpec(),
                        "classe_id"=> $obj->getMaClasse()->getIdCla(),
                        "tut_id"=> $obj->getMonTuteur()->getIdUti(),
                        "ent_id"=> $obj->getMonEnt()->getIdEnt(),
                        "maitre_appr_id"=> $obj->getMonMaitreAp()->getIdMaiAppr(),
                        "etu_id"=> $obj->getIdUti()
                    ]);
                    if ($r !== false) {
                        $result = true;
                    }
                }
            }
        }
        return $result;
    }

    public function find(int $id): object
    {
        static $cache = []; // Cache local pour éviter les cycles

        // Vérifiez si l'objet est déjà dans le cache
        if (isset($cache[$id])) {
            return $cache[$id];
        }
        $result = null;
        $bil1DAO = new Bilan1DAO($this->bdd);
        $bil2DAO = new Bilan2DAO($this->bdd);
        $query = "SELECT * FROM Etudiant WHERE etu_id = :etu_id";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            "etu_id" => $id
        ]);
        if ($r !== false) {
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if (!is_null($row)) {
                $tuteur = null;
                if (isset($row['tut_id'])) {
                    $tuteurModel = new TuteurDAO($this->bdd);
                    $tuteur = $tuteurModel->find($row['tut_id']);
                }else{
                    $tuteur = null;
                }
                $entreprise = null;
                if (isset($row['ent_id'])) {
                    $entrepriseModel = new EntrepriseDAO($this->bdd);
                    $entreprise = $entrepriseModel->find($row['ent_id']);
                }
                else{
                    $entreprise = null;
                }
                $specialite = null;
                if (isset($row['spe_id'])) {
                    $specialiteModel = new SpecialiteDAO($this->bdd);
                    $specialite = $specialiteModel->find($row['spe_id']);
                }
                else{
                    $specialite = null;
                }
                $classe = null;
                if (isset($row['classe_id'])) {
                    $classeModel = new ClasseDAO($this->bdd);
                    $classe = $classeModel->find($row['classe_id']);
                }
                else{
                    $classe = null;
                }
                $maitreappre = null;
                if (isset($row['maitre_appr_id'])) {
                    $maitreappreModel = new MaitreApprentissageDAO($this->bdd);
                    $maitreappre = $maitreappreModel->find($row['maitre_appr_id']);
                }
                else{
                    $maitreappre = null;
                }
                $res = new Etudiant($tuteur,$specialite,$classe,$maitreappre,$entreprise,$row['etu_id'],$row['etu_nom'],$row['etu_pre'],$row['etu_email'],$row['etu_mdp'],$row['etu_tel'],$row['etu_adr'],$row['etu_cp'],$row['etu_ville']);
                $cache[$id] = $res;
                $bil1 = $bil1DAO->getallBilan1ByEleve($res);
                if ($bil1 == null){
                    $bil1 = [];
                }
                $res->setMesBilan1($bil1);


                $bil2 = $bil2DAO->getallBilan2ByEleve($res);
                if ($bil2 == null){
                    $bil2 = [];
                }
                $res->setMesBilan2($bil2);
                $result = $res;
            }
        }
        return $result;
    }


    public function getAll(): array
    {
        $query = "SELECT * FROM Etudiant";
        $stmt = $this->bdd->prepare($query);
        if ($stmt) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row) {
                $tuteur = null;
                if (isset($row['tut_id'])) {
                    $tuteurModel = new TuteurDAO($this->bdd);
                    $tuteur = $tuteurModel->find($row['tut_id']);
                }else{
                    $tuteur = null;
                }
                $entreprise = null;
                if (isset($row['ent_id'])) {
                    $entrepriseModel = new EntrepriseDAO($this->bdd);
                    $entreprise = $entrepriseModel->find($row['ent_id']);
                }
                else{
                    $entreprise = null;
                }
                $specialite = null;
                if (isset($row['spe_id'])) {
                    $specialiteModel = new SpecialiteDAO($this->bdd);
                    $specialite = $specialiteModel->find($row['spe_id']);
                }
                else{
                    $specialite = null;
                }
                $classe = null;
                if (isset($row['classe_id'])) {
                    $classeModel = new ClasseDAO($this->bdd);
                    $classe = $classeModel->find($row['classe_id']);
                }
                else{
                    $classe = null;
                }
                $maitreappre = null;
                if (isset($row['maitre_appr_id'])) {
                    $maitreappreModel = new MaitreApprentissageDAO($this->bdd);
                    $maitreappre = $maitreappreModel->find($row['maitre_appr_id']);
                }
                else{
                    $maitreappre = null;
                }
                $result[] = new Etudiant($tuteur,$specialite,$classe,$maitreappre,$entreprise,$row['etu_id'],$row['etu_nom'],$row['etu_pre'],$row['etu_email'],$row['etu_mdp'],$row['etu_tel'],$row['etu_adr'],$row['etu_cp'],$row['etu_ville']);
            }
        } else {
            $result = [null] ;
        }

        return $result;
    }
    public function authentification($email,$mdp): object
    {
        $result = null;
        $query = "SELECT * FROM Etudiant WHERE etu_email = :email AND etu_mdp = :mdp;";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            'email' => $email,
            'mdp' => $mdp
        ]);
        if ($r !== false) {
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if (!is_null($row)) {
                $tuteur = null;
                if (isset($row['tut_id'])) {
                    $tuteurModel = new TuteurDAO($this->bdd);
                    $tuteur = $tuteurModel->find($row['tut_id']);
                }else{
                    $tuteur = null;
                }
                $entreprise = null;
                if (isset($row['ent_id'])) {
                    $entrepriseModel = new EntrepriseDAO($this->bdd);
                    $entreprise = $entrepriseModel->find($row['ent_id']);
                }
                else{
                    $entreprise = null;
                }
                $specialite = null;
                if (isset($row['spe_id'])) {
                    $specialiteModel = new SpecialiteDAO($this->bdd);
                    $specialite = $specialiteModel->find($row['spe_id']);
                }
                else{
                    $specialite = null;
                }
                $classe = null;
                if (isset($row['classe_id'])) {
                    $classeModel = new ClasseDAO($this->bdd);
                    $classe = $classeModel->find($row['classe_id']);
                }
                else{
                    $classe = null;
                }
                $maitreappre = null;
                if (isset($row['maitre_appr_id'])) {
                    $maitreappreModel = new MaitreApprentissageDAO($this->bdd);
                    $maitreappre = $maitreappreModel->find($row['maitre_appr_id']);
                }
                else{
                    $maitreappre = null;
                }
                $result = new Etudiant($tuteur,$specialite,$classe,$maitreappre,$entreprise,$row['etu_id'],$row['etu_nom'],$row['etu_pre'],$row['etu_email'],$row['etu_mdp'],$row['etu_tel'],$row['etu_adr'],$row['etu_cp'],$row['etu_ville']);

            }
        }
        return $result;
    }
    public function getAllEtuByTut(Tuteur $tut) : ?array {
        $bil1DAO = new Bilan1DAO($this->bdd);
        $bil2DAO = new Bilan2DAO($this->bdd);
        $query = "SELECT * FROM Etudiant WHERE tut_id = :tut_id";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            "tut_id" => $tut->getIdUti()
        ]);
        if ($r) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row) {
                $tuteur = null;
                if (isset($row['tut_id'])) {
                    $tuteurModel = new TuteurDAO($this->bdd);
                    $tuteur = $tuteurModel->find($row['tut_id']);
                }else{
                    $tuteur = null;
                }
                $entreprise = null;
                if (isset($row['ent_id'])) {
                    $entrepriseModel = new EntrepriseDAO($this->bdd);
                    $entreprise = $entrepriseModel->find($row['ent_id']);
                }
                else{
                    $entreprise = null;
                }
                $specialite = null;
                if (isset($row['spe_id'])) {
                    $specialiteModel = new SpecialiteDAO($this->bdd);
                    $specialite = $specialiteModel->find($row['spe_id']);
                }
                else{
                    $specialite = null;
                }
                $classe = null;
                if (isset($row['classe_id'])) {
                    $classeModel = new ClasseDAO($this->bdd);
                    $classe = $classeModel->find($row['classe_id']);
                }
                else{
                    $classe = null;
                }
                $maitreappre = null;
                if (isset($row['maitre_appr_id'])) {
                    $maitreappreModel = new MaitreApprentissageDAO($this->bdd);
                    $maitreappre = $maitreappreModel->find($row['maitre_appr_id']);
                }
                else{
                    $maitreappre = null;
                }
                $res = new Etudiant($tuteur,$specialite,$classe,$maitreappre,$entreprise,$row['etu_id'],$row['etu_nom'],$row['etu_pre'],$row['etu_email'],$row['etu_mdp'],$row['etu_tel'],$row['etu_adr'],$row['etu_cp'],$row['etu_ville']);
                $bil1 = $bil1DAO->getallBilan1ByEleve($res);
                if ($bil1 == null){
                    $bil1 = [];
                }
                $res->setMesBilan1($bil1);


                $bil2 = $bil2DAO->getallBilan2ByEleve($res);
                if ($bil2 == null){
                    $bil2 = [];
                }
                $res->setMesBilan2($bil2);
                $result[] = $res;
            }
        } else {
            $result = [null] ;
        }

        return $result;
    }
}