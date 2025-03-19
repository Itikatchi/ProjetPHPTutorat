<?php
namespace DAO;
use BO\Classe;

use PDO;
use PDOException;
use ProjetPHPTutorat\MVC\DAO\DAO;

require_once 'DAO.php';

class ClasseDAO extends DAO
{



    public function create($obj): bool
    {
        $result = false;
        if ($obj instanceof Classe) {
            $query = "INSERT INTO Classe(classe_nom) VALUES(:classe_nom)";
            $stmt = $this->bdd->prepare($query);
            $r = $stmt->execute([
                "classe_nom" => $obj->getNomCla()
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
        if ($obj instanceof Classe) {
            $tmp = $this->find($obj->getIdCla());
            if ($tmp !== null) {
                if ($obj->getIdCla() == $tmp->getIdCla()) {
                    $query = "DELETE FROM Classe WHERE classe_id = :classe_id";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        "classe_id" => $obj->getIdCla()
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
        if ($obj instanceof Classe) {
            $tmp = $this->find($obj->getIdCla());
            if ($tmp !== null) {
                if ($obj->getIdCla() == $tmp->getIdCla()) {
                    $query = "UPDATE Classe SET classe_nom = :classe_nom WHERE classe_id = :classe_id";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        "classe_nom" => $obj->getNomCla(),
                        "classe_id" => $obj->getIdCla()
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
        $query = "SELECT * FROM Classe WHERE classe_id = :classe_id";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            "classe_id" => $id
        ]);
        if ($r !== false) {
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if (!is_null($row)) {
                $result = new Classe($row['classe_id'], $row['classe_nom']);
            }
        }
        return $result;
    }


    public function getAll(): array
    {
        $query = "SELECT * FROM Classe";
        $stmt = $this->bdd->query($query);
        if ($stmt) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row) {
                $result[] = new Classe($row['classe_id'], $row['classe_nom']);
            }
        } else {
            $result = [null] ;
        }

        return $result;
    }

}