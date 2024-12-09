<?php
namespace ProjetPHPTutorat\MVC\DAO;

namespace DAO;

use BO\Etudiant;

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

                $tmp = $this->find($obj->getIdUti());
                if ($tmp) {
                    if ($obj->getIdUti() == $tmp->getIdUti()) {
                        $query = "DELETE FROM Etudiant WHERE etu_id = :etu_id";
                        $stmt = $this->bdd->prepare($query);
                        $r = $stmt->execute([
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
        $result = null;
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
                $result = new Etudiant($tuteur,$specialite,$classe,$maitreappre,$entreprise,$row['etu_id'],$row['etu_nom'],$row['etu_pre'],$row['etu_email'],$row['etu_mdp'],$row['etu_tel'],$row['etu_adr'],$row['etu_cp'],$row['etu_ville']);

            }
        }
        return $result;
    }

    public function getAll(): array
    {
        $query = "SELECT * FROM Etudiant";
        $stmt = $this->bdd->query($query);
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
}