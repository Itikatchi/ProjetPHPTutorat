<?php
namespace DAO;
use BO\Entreprise;
use BO\MaitreApprentissage;
require_once "../BO/Entreprise.php";
require_once "../DAO/EntrepriseDAO.php";

use PDO;
use PDOException;
use ProjetPHPTutorat\MVC\DAO\DAO;

require_once 'DAO.php';
class MaitreApprentissageDAO extends DAO
{


    public function create($obj): bool
    {
        $result = false;
        if ($obj instanceof MaitreApprentissage) {
            $query = "INSERT INTO maitreapprentissage(maitre_appr_pre,maitre_appr_nom,maitre_appr_tel,maitre_appr_email,ent_id) VALUES(:maitre_appr_pre, :maitre_appr_nom, :maitre_appr_tel, :maitre_appr_email, :ent_id)";
            $stmt = $this->bdd->prepare($query);
            $r = $stmt->execute([
                "maitre_appr_pre" => $obj->getPreMaiAppr(),
                "maitre_appr_nom" => $obj->getNomMaiAppr(),
                "maitre_appr_tel" => $obj->getTelMaiAppr(),
                "maitre_appr_email" =>$obj->getMailMaiAppr(),
                "ent_id" =>$obj->getEntreprise()->getIdEnt()
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
        if ($obj instanceof MaitreApprentissage) {
            $tmp = $this->find($obj->getIdMaiAppr());
            if ($tmp !== null) {
                if ($obj->getIdMaiAppr() == $tmp->getIdMaiAppr()) {
                    $query = "DELETE FROM maitreapprentissage WHERE maitre_appr_id = :maitre_appr_id";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        "maitre_appr_id" => $obj->getIdMaiAppr()
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
        if ($obj instanceof MaitreApprentissage) {
            $tmp = $this->find($obj->getIdMaiAppr());
            if ($tmp !== null) {
                if ($obj->getIdMaiAppr() == $tmp->getIdMaiAppr()) {
                    $query = "UPDATE maitreapprentissage SET maitre_appr_pre = :maitre_appr_pre, maitre_appr_nom = :maitre_appr_nom,maitre_appr_tel = :maitre_appr_tel, maitre_appr_email = :maitre_appr_email, ent_id = :ent_id WHERE maitre_appr_id = :maitre_appr_id";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        "maitre_appr_pre" => $obj->getPreMaiAppr(),
                        "maitre_appr_nom" => $obj->getNomMaiAppr(),
                        "maitre_appr_tel" => $obj->getTelMaiAppr(),
                        "maitre_appr_email" => $obj->getMailMaiAppr(),
                        "ent_id" => $obj->getEntreprise()->getIdEnt(),
                        "maitre_appr_id" => $obj->getIdMaiAppr()
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
        $query = "SELECT * FROM maitreapprentissage WHERE maitre_appr_id = :maitre_appr_id";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            "maitre_appr_id" => $id
        ]);
        if ($r !== false) {
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if (!is_null($row)) {
                $entreprise = null;
                if (isset($row['ent_id'])) {
                    $entrepriseModel = new EntrepriseDAO($this->bdd);
                    $entreprise = $entrepriseModel->find($row['ent_id']);
                }
                $result = new MaitreApprentissage($row['maitre_appr_id'],$row['maitre_appr_nom'], $row['maitre_appr_pre'],$row['maitre_appr_tel'],$row['maitre_appr_email'],$entreprise);
            }
        }
        return $result;
    }


    public function getAll(): array
    {
        $query = "SELECT * FROM maitreapprentissage";
        $stmt = $this->bdd->query($query);
        if ($stmt) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row) {
                $entreprise = null;
                if (isset($row['ent_id'])) {
                    $entrepriseModel = new EntrepriseDAO($this->bdd);
                    $entreprise = $entrepriseModel->find($row['ent_id']);
                }
                $result[] = new MaitreApprentissage($row['maitre_appr_id'],$row['maitre_appr_nom'], $row['maitre_appr_pre'],$row['maitre_appr_tel'],$row['maitre_appr_email'],$entreprise);
            }
        } else {
            $result = [null] ;
        }

        return $result;
    }
    public function getByEntrepriseId(int $entrepriseId): array
    {
        $result = [];
        $query = "SELECT * FROM maitreapprentissage WHERE ent_id = :ent_id";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            "ent_id" => $entrepriseId
        ]);

        if ($r) {
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                $entreprise = null;
                if (isset($row['ent_id'])) {
                    $entrepriseModel = new EntrepriseDAO($this->bdd);
                    $entreprise = $entrepriseModel->find($row['ent_id']);
                }
                $result[] = new MaitreApprentissage(
                    $row['maitre_appr_id'],
                    $row['maitre_appr_nom'],
                    $row['maitre_appr_pre'],
                    $row['maitre_appr_tel'],
                    $row['maitre_appr_email'],
                    $entreprise
                );
            }
        }

        return $result;
    }
}