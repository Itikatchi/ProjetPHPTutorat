<?php
namespace DAO;

use BO\Entreprise;

use PDO;
use PDOException;
use ProjetPHPTutorat\MVC\DAO\DAO;

require_once 'DAO.php';

class EntrepriseDAO extends DAO
{



    public function create($obj): bool
    {
        $result = false;
        if ($obj instanceof Entreprise) {
            $query = "INSERT INTO Entreprise(ent_nom,ent_adr,ent_cp,ent_ville) VALUES(:ent_nom,:ent_adr,:ent_cp,:ent_ville)";
            $stmt = $this->bdd->prepare($query);
            $r = $stmt->execute([
                "ent_nom" => $obj->getNomEnt(),
                "ent_adr" => $obj->getAdrEnt(),
                "ent_cp" => $obj->getCpEnt(),
                "ent_ville" => $obj->getVilEnt(),

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
        if ($obj instanceof Entreprise) {
            $tmp = $this->find($obj->getIdEnt());
            if ($tmp !== null) {
                if ($obj->getIdEnt() == $tmp->getIdEnt()) {
                    $query = "DELETE FROM Entreprise WHERE ent_id = :ent_id";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        "ent_id" => $obj->getIdEnt()
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
        if ($obj instanceof Entreprise) {
            $tmp = $this->find($obj->getIdEnt());
            if ($tmp !== null) {
                if ($obj->getIdEnt() == $tmp->getIdEnt()) {
                    $query = "UPDATE Entreprise SET ent_nom = :ent_nom, ent_adr = :ent_adr,ent_cp = :ent_cp, ent_ville = :ent_ville WHERE ent_id = :ent_id";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        "ent_nom" => $obj->getNomEnt(),
                        "ent_adr" => $obj->getAdrEnt(),
                        "ent_cp" => $obj->getCpEnt(),
                        "ent_ville" => $obj->getVilEnt(),
                        "ent_id" => $obj->getIdEnt()
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
        $query = "SELECT * FROM Entreprise WHERE ent_id = :ent_id";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            "ent_id" => $id
        ]);
        if ($r !== false) {
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if (!is_null($row)) {
                $result = new Entreprise($row['ent_id'],$row['ent_nom'], $row['ent_adr'], $row['ent_cp'], $row['ent_ville']);
            }
        }
        return $result;
    }

    public function getAll(): array
    {
        $query = "SELECT * FROM Entreprise";
        $stmt = $this->bdd->query($query);
        if ($stmt) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row) {
                $result[] = new Entreprise($row['ent_id'],$row['ent_nom'], $row['ent_adr'], $row['ent_cp'], $row['ent_ville']);
            }
        } else {
            $result = [null] ;
        }

        return $result;
    }
}