<?php
namespace DAO;

use BO\Tuteur;

use PDO;
use PDOException;
use ProjetPHPTutorat\MVC\DAO\DAO;

require_once 'DAO.php';
class TuteurDAO extends DAO {



    public function create($obj): bool
    {
        $result = false;
        if ($obj instanceof Tuteur) {
            $query = "INSERT INTO Tuteur(tut_pre,tut_nom,tut_mdp,tut_tel,tut_email,tut_nb_etu_actu) VALUES(:tut_pre, :tut_nom, :tut_mdp, :tut_tel, :tut_email, :tut_nb_etu_actu)";
            $stmt = $this->bdd->prepare($query);
            $r = $stmt->execute([
                "tut_pre" => $obj->getPrenomUti(),
                "tut_nom" => $obj->getNomUti(),
                "tut_mdp" => $obj->getMdpUti(),
                "tut_tel"  => $obj->getTutTel(),
                "tut_email" => $obj->getEmailUti(),
                "tut_nb_etu_actu" => $obj->getTutNbEtu()
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
        if ($obj instanceof Tuteur) {
            $tmp = $this->find($obj->getIdUti());
            if ($tmp !== null) {
                if ($obj->getIdUti() == $tmp->getIdUti()) {
                    $query = "DELETE FROM Tuteur WHERE tut_id = :tut_id";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        "tut_id" => $obj->getIdUti()
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
        if ($obj instanceof Tuteur) {
            $tmp = $this->find($obj->getIdUti());
            if ($tmp !== null) {
                if ($obj->getIdUti() == $tmp->getIdUti()) {
                    $query = "UPDATE Tuteur SET tut_pre = :tut_pre, tut_nom = :tut_nom,tut_mdp = :tut_mdp, tut_tel = :tut_tel, tut_email = :tut_email, tut_nb_etu_actu = :tut_nb_etu_actu WHERE tut_id = :tut_id";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        "tut_pre" => $obj->getNomUti(),
                        "tut_nom" => $obj->getPrenomUti(),
                        "tut_mdp" => $obj->getMdpUti(),
                        "tut_tel"  => $obj->getTutTel(),
                        "tut_email" => $obj->getEmailUti(),
                        "tut_nb_etu_actu" => $obj->getTutNbEtu(),
                        "tut_id" => $obj->getIdUti()
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
        $query = "SELECT * FROM Tuteur WHERE tut_id = :tut_id";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            "tut_id" => $id
        ]);
        if ($r !== false) {
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if (!is_null($row)) {
                $result = new Tuteur($row['tut_tel'],$row['tut_nb_etu_actu'], $row['tut_id'], $row['tut_nom'],$row['tut_pre'],$row['tut_email'],$row['tut_mdp']);
            }
        }
        return $result;
    }


    public function getAll(): array
    {
        $query = "SELECT * FROM Tuteur";
        $stmt = $this->bdd->query($query);
        if ($stmt) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row) {
                $result[]  = new Tuteur($row['tut_tel'],$row['tut_nb_etu_actu'], $row['tut_id'], $row['tut_nom'],$row['tut_pre'],$row['tut_email'],$row['tut_mdp']);
            }
        } else {
            $result = [null] ;
        }
        return $result;
    }

    public function authentification($email, $mdp): ?Tuteur
    {
        $result = null;
        $query = "SELECT * FROM Tuteur WHERE tut_email = :email AND tut_mdp = :mdp;";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            'email' => $email,
            'mdp' => $mdp
        ]);

        if ($r !== false) {
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;

            if (!is_null($row)) {
                $result = new Tuteur(
                    $row['tut_tel'],
                    $row['tut_nb_etu_actu'],
                    $row['tut_id'],
                    $row['tut_nom'],
                    $row['tut_pre'],
                    $row['tut_email'],
                    $row['tut_mdp']
                );
            }
        }

        return $result;
    }



}