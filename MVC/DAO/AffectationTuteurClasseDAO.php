<?php
namespace ProjetPHPTutorat\MVC\DAO;

use BO\AffectationTuteurClasse;

class AffectationTuteurClasseDAO extends DAO
{

    use p2025jeuhasardetudiant\components\BO\Tuteur;
    use PDO;
    use PDOException;

    public function create($obj): bool
    {
        $result = false;
        if ($obj instanceof AffectationTuteurClasse) {
            $query = "INSERT INTO AffectationTuteurClasse(tut_id,classe_id,tuteur_nb_max_etu) VALUES(:tut_id,:classe_id,:tuteur_nb_max_etu)";
            $stmt = $this->bdd->prepare($query);
            $r = $stmt->execute([
                "tut_id" => $obj->getTuteur()->getIdUti(),
                "classe_id"=> $obj->getClasse()->getIdCla(),
                "tuteur_nb_max_etu"=>$obj->getNbMaxEtu()

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
        if ($obj instanceof AffectationTuteurClasse) {
            $tmp = $this->find($obj->getClasse()->getIdCla());
            $tmp2 = $this->find($obj->getTuteur()->getIdUti());
            if ($tmp !== null || $tmp2 !== null) {
                if ($obj->getClasse()->getIdCla() == $tmp->getClasse()->getIdCla() && $obj->getTuteur()->getIdUti() == $tmp2->getTuteur()->getIdUti()) {
                    $query = "DELETE FROM AffectationTuteurClasse WHERE tut_id = :tut_id AND classe_id = :classe_id";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        "tut_id" => $obj->getTuteur()->getIdUti(),
                        "classe_id" => $obj->getClasse()->getIdCla()
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
        // TODO: Implement update() method.
    }

    public function find(int $id): object
    {
        // TODO: Implement find() method.
    }

    public function getAll(): array
    {
        // TODO: Implement getAll() method.
    }
}