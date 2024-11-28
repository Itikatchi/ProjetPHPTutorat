<?php
namespace ProjetPHPTutorat\MVC\DAO;

use BO\Classe;

class ClasseDAO extends DAO
{


    use PDO;
    use PDOException;

    public function create($obj): bool
    {
        $result = false;
        if ($obj instanceof Classe) {
            $query = "INSERT INTO Classe(classe_nom) VALUES(:nomCla)";
            $stmt = $this->bdd->prepare($query);
            $r = $stmt->execute([
                "nomCla" => $obj->getNomCla()
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
                    $query = "DELETE FROM Classe WHERE classe_id = :idCla";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        "idCla" => $obj->getIdCla()
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
                    $query = "UPDATE Classe SET classe_nom = :libCla WHERE classe_id = :idCla";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        "nomCla" => $obj->getNomCla(),
                        "idCla" => $obj->getIdCla()
                    ]);
                    if ($r !== false) {
                        $result = true;
                    }
                }
            }
        }
        return $result;
    }


    public function find(int $id): array
    {
        $result = null;
        $query = "SELECT * FROM Classe WHERE classe_id = :idCla";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            "idCla" => $id
        ]);
        if ($r !== false) {
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if (!is_null($row)) {
                $result = new Classe($row['idCla'], $row['nomCla']);
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
                $result[] = new Classe($row['idCla'], $row['nomCla']);
            }
        } else {
            $result = [null] ;
        }

        return $result;
    }

}