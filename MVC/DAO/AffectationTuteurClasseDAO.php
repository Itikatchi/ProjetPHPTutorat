<?php
namespace DAO;

use BO\Tuteur;
use PDO;
use PDOException;
use ProjetPHPTutorat\MVC\DAO\DAO;
use BO\AffectationTuteurClasse;
require_once 'DAO.php';

class AffectationTuteurClasseDAO extends DAO
{
    public function create($obj): bool
    {
        $result = false;
        if ($obj instanceof AffectationTuteurClasse) {
            try {
                $query = "INSERT INTO gerer (tut_id, classe_id, tuteur_nb_max_etu) VALUES (:tut_id, :classe_id, :tuteur_nb_max_etu)";
                $stmt = $this->bdd->prepare($query);
                $stmt->execute([
                    "tut_id" => $obj->getTuteur()->getIdUti(),
                    "classe_id" => $obj->getClasse()->getIdCla(),
                    "tuteur_nb_max_etu" => $obj->getNbMaxEtu()
                ]);
                $result = true;
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
        }
        return $result;
    }
    public function delete($id): bool
    {
        $result = false;
        try {
            $query = "DELETE FROM gerer WHERE id = :id";
            $stmt = $this->bdd->prepare($query);
            $stmt->execute(["id" => $id]);
            $result = true;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        return $result;
    }

    public function update($obj): bool
    {
        $result = false;
        if ($obj instanceof AffectationTuteurClasse) {
            try {
                $query = "UPDATE gerer SET tut_id = :tut_id, classe_id = :classe_id, tuteur_nb_max_etu = :tuteur_nb_max_etu WHERE id = :id";
                $stmt = $this->bdd->prepare($query);
                $stmt->execute([
                    "tut_id" => $obj->getTuteur()->getIdUti(),
                    "classe_id" => $obj->getClasse()->getIdCla(),
                    "tuteur_nb_max_etu" => $obj->getNbMaxEtu(),
                    "id" => $obj->getId() // Assurez-vous que votre classe AffectationTuteurClasse dispose d'une méthode getId()
                ]);
                $result = true;
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
        }
        return $result;
    }


    public function getAll(): array
    {
        $result = [];
        try {
            $query = "SELECT * FROM gerer";
            $stmt = $this->bdd->query($query);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row) {
                $affectation = new AffectationTuteurClasse();
                $affectation->setId($row['id']);
                $affectation->setTuteur($row['tut_id']);
                $affectation->setClasse($row['classe_id']);
                $affectation->setNbMaxEtu($row['tuteur_nb_max_etu']);
                $result[] = $affectation;
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        return $result;
    }


    public function find(int $id): object
    {
        // TODO: Implement find() method.
    }
}