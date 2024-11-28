<?php

namespace DAO;

use BO\Administrateur;

use PDO;
use PDOException;
use ProjetPHPTutorat\MVC\DAO\DAO;

require_once 'DAO.php';

class AdministrateurDAO extends DAO
{

    public function create($obj): bool
    {
        $result = false;
        if ($obj instanceof Administrateur) {
            $query = "INSERT INTO Administrateur(adm_pre,adm_nom,adm_email,adm_mdp) VALUES(:adm_pre,:adm_nom,:adm_email,:adm_mdp)";
            $stmt = $this->bdd->prepare($query);
            $r = $stmt->execute([
                "adm_pre"=> $obj->getPrenomUti(),
                "adm_nom"=> $obj->getNomUti(),
                "adm_email"=> $obj->getEmailUti(),
                "adm_mdp"=> $obj->getMdpUti()
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
        if ($obj instanceof Administrateur) {
            $tmp = $this->find($obj->getIdUti());
            if ($tmp !== null) {
                if ($obj->getIdUti() == $tmp->getIdUti()) {
                    $query = "DELETE FROM Administrateur WHERE adm_id = :adm_id";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        "adm_id" => $obj->getIdUti()
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
        if ($obj instanceof Administrateur) {
            $tmp = $this->find($obj->getIdUti());
            if ($tmp !== null) {
                if ($obj->getIdUti() == $tmp->getIdUti()) {
                    $query = "UPDATE Administrateur SET adm_pre = :adm_pre,adm_nom = :adm_nom,adm_email = :adm_email,adm_mdp = :adm_mdp WHERE adm_id = :adm_id";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        "adm_pre"=> $obj->getPrenomUti(),
                        "adm_nom"=> $obj->getNomUti(),
                        "adm_email"=> $obj->getEmailUti(),
                        "adm_mdp"=> $obj->getMdpUti(),
                        "adm_id" => $obj->getIdUti()
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
        $query = "SELECT * FROM Administrateur WHERE adm_id = :adm_id";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            "adm_id" => $id
        ]);
        if ($r !== false) {
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if (!is_null($row)) {
                $result = new Administrateur($row['adm_id'],$row['adm_pre'],$row['adm_nom'],$row['adm_email'],$row['adm_mdp']);
            }
        }
        return $result;
    }

    public function getAll(): array
    {
        $query = "SELECT * FROM Administrateur";
        $stmt = $this->bdd->query($query);
        if ($stmt) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row) {
                $result[] = new Administrateur($row['adm_id'],$row['adm_pre'],$row['adm_nom'],$row['adm_email'],$row['adm_mdp']);
            }
        } else {
            $result = [null] ;
        }

        return $result;
    }
}