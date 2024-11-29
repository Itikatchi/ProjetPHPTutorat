<?php

namespace DAO;

use BO\Bilan2;

use BO\Etudiant;
use PDO;
use PDOException;
use ProjetPHPTutorat\MVC\DAO\DAO;
use DAO\EtduiantDAO;
use DateTime;
require_once 'EtduiantDAO.php';

require_once 'DAO.php';
class Bilan2DAO extends DAO
{


    public function create($obj): bool
    {
        $result = false;
        if ($obj instanceof Bilan2) {
            $query = "INSERT INTO Bilan2(bil2_sujet_memoire,bil2_date,bil2_note_dossier,bil2_note_oral,bil2_remarques,etu_id) VALUES(:bil2_sujet_memoire,:bil2_date,:bil2_note_dossier,:bil2_note_oral,:bil2_remarques,:etu_id))";
            $stmt = $this->bdd->prepare($query);
            $r = $stmt->execute([
                "bil2_sujet_memoire"=> $obj->getSujBil(),
                "bil2_date"=> $obj->getDatBil2(),
                "bil2_note_dossier"=> $obj->getNotBil(),
                "bil2_note_oral"=> $obj->getNotOra(),
                "bil2_remarques"=> $obj->getRemBil(),
                "etu_id"=> $obj->getMonEtu()->getIdUti()

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
        if ($obj instanceof Bilan2) {
            $tmp = $this->find($obj->getIdBil());
            if ($tmp !== null) {
                if ($obj->getIdBil() == $tmp->getIdBil()) {
                    $query = "DELETE FROM Bilan2 WHERE bil2_id = :bil2_id";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        "bil2_id" => $obj->getIdBil()
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
        if ($obj instanceof Bilan2) {
            $tmp = $this->find($obj->getIdBil());
            if ($tmp !== null) {
                if ($obj->getIdBil() == $tmp->getIdBil()) {
                    $query = "UPDATE Bilan2 SET bil2_sujet_memoire = :bil2_sujet_memoire,bil2_date =:bil2_date, bil2_note_dossier = :bil2_note_dossier,bil2_note_oral = :bil2_note_oral, bil2_remarques = :bil2_remarques, etu_id = :etu_id WHERE bil2_id = :bil2_id";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        "bil2_sujet_memoire"=> $obj->getSujBil(),
                        "bil2_date"=> $obj->getDatBil2(),
                        "bil2_note_dossier"=> $obj->getNotBil(),
                        "bil2_note_oral"=> $obj->getNotOra(),
                        "bil2_remarques"=> $obj->getRemBil(),
                        "etu_id"=> $obj->getMonEtu()->getIdUti(),
                        "bil2_id" => $obj->getIdBil()
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
        $query = "SELECT * FROM Bilan2 WHERE bil2_id = :bil2_id";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            "bil2_id" => $id
        ]);
        if ($r !== false) {
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if (!is_null($row)) {
                $etudiant = null;
                if (isset($row['etu_id'])) {
                    $etudiantmodel = new EtduiantDAO($this->bdd);
                    $etudiant = $etudiantmodel->find($row['etu_id']);
                }
                $result = new Bilan2($row['bil2_sujet_memoire'], new DateTime($row['bil2_date']),$row['bil2_id'],$row['bil2_remarques'],$row['bil2_note_dossier'],$row['bil2_note_oral'],$etudiant);
            }
        }
        return $result;
    }

    public function getAll(): array
    {
        $query = "SELECT * FROM Bilan2";
        $stmt = $this->bdd->query($query);
        if ($stmt) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row) {
                if (isset($row['etu_id'])) {
                    $etudiantmodel = new EtduiantDAO($this->bdd);
                    $etudiant = $etudiantmodel->find($row['etu_id']);
                }
                $result[] = new Bilan2($row['bil2_sujet_memoire'], new DateTime($row['bil2_date']),$row['bil2_id'],$row['bil2_remarques'],$row['bil2_note_dossier'],$row['bil2_note_oral'],$etudiant);
            }
        } else {
            $result = [null] ;
        }

        return $result;
    }
    public function getallBilan2ByEleve(Etudiant $etudiant) : ?array
    {
        $query = "SELECT * FROM Bilan2 WHERE etu_id = :etu_id";
        $stmt = $this->bdd->prepare($query);
        $stmt->execute([
            "etu_id" => $etudiant->getIdUti()
        ]);
        if ($stmt){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row) {
                if (isset($row['etu_id'])) {
                    $etudiantmodel = new EtduiantDAO($this->bdd);
                    $etudiant = $etudiantmodel->find($row['etu_id']);
                }
                $result[] = new Bilan2($row['bil2_sujet_memoire'], new DateTime($row['bil2_date']),$row['bil2_id'],$row['bil2_remarques'],$row['bil2_note_dossier'],$row['bil2_note_oral'],$etudiant);
            }
        } else {
            $result = [null] ;
        }

        return $result;
    }
}