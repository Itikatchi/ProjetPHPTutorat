<?php
namespace DAO;
use BO\Specialite;

use PDO;
use PDOException;
use ProjetPHPTutorat\MVC\DAO\DAO;

require_once 'DAO.php';
class SpecialiteDAO extends DAO
{

    public function create($obj): bool
    {
        $result = false;
        if ($obj instanceof Specialite) {
            $query = "INSERT INTO Specialite(spe_nom) VALUES(:spe_nom)";
            $stmt = $this->bdd->prepare($query);
            $r = $stmt->execute([
                "spe_nom" => $obj->getNomSpec(),

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
        if ($obj instanceof Specialite) {
            $tmp = $this->find($obj->getIdSpec());
            if ($tmp !== null) {
                if ($obj->getIdSpec() == $tmp->getIdSpec()) {
                    $query = "DELETE FROM Specialite WHERE spe_id = :spe_id";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        "spe_id" => $obj->getIdSpec()
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
        if ($obj instanceof Specialite) {
            $tmp = $this->find($obj->getIdSpec());
            if ($tmp !== null) {
                if ($obj->getIdSpec() == $tmp->getIdSpec()) {
                    $query = "UPDATE Specialite SET spe_nom = :spe_nom WHERE spe_id = :spe_id";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        "spe_nom" => $obj->getNomSpec(),

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
        $query = "SELECT * FROM Specialite WHERE spe_id = :spe_id";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            "spe_id" => $id
        ]);
        if ($r !== false) {
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if (!is_null($row)) {
                $result = new Specialite($row['spe_id'],$row['spe_nom']);
            }
        }
        return $result;
    }


    public function getAll(): array
    {
        $query = "SELECT * FROM Specialite";
        $stmt = $this->bdd->query($query);
        if ($stmt) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row) {
                $result[] = new Specialite($row['spe_id'],$row['spe_nom']);
            }
        } else {
            $result = [null] ;
        }

        return $result;
    }
}