<?php
namespace ProjetPHPTutorat\MVC\DAO;

use BO\Administrateur;

class AdministrateurDAO extends DAO
{

    use PDO;
    use PDOException;

    public function create($obj): bool
    {
        $result = false;
        if ($obj instanceof Administrateur) {
            $query = "INSERT INTO Administrateur(classe_nom) VALUES(:nomCla)";
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
        // TODO: Implement delete() method.
    }

    public function update($obj): bool
    {
        // TODO: Implement update() method.
    }

    public function find(int $id): array
    {
        // TODO: Implement find() method.
    }

    public function getAll(): array
    {
        // TODO: Implement getAll() method.
    }
}