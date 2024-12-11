<?php

namespace DAO;

use BO\Bilan1;

use BO\Etudiant;
use PDO;
use PDOException;
use ProjetPHPTutorat\MVC\DAO\DAO;
use DAO\EtduiantDAO;
use DateTime;

require_once 'EtduiantDAO.php';

require_once 'DAO.php';
class Bilan1DAO extends DAO
{


    public function create($obj): bool
    {
        $result = false;
        if ($obj instanceof Bilan1) {
            $query = "INSERT INTO Bilan1(bil1_date_visite_ent,bil1_note_entreprise,bil1_note_dossier,bil1_note_oral,bil1_remarques,etu_id) VALUES(:bil1_date_visite_ent,:bil1_note_entreprise,:bil1_note_dossier,:bil1_note_oral,:bil1_remarques,:etu_id)";
            $stmt = $this->bdd->prepare($query);

            $dateVisite = $obj->getDatVisEnt();
            $dateString = ($dateVisite instanceof DateTime) ? $dateVisite->format('Y-m-d H:i:s') : $dateVisite;

            $r = $stmt->execute([
                "bil1_date_visite_ent"=> $dateString,
                "bil1_note_entreprise"=> $obj->getNotEnt(),
                "bil1_note_dossier"=> $obj->getNotDosBil(),
                "bil1_note_oral"=> $obj->getNotOraBil(),
                "bil1_remarques"=> $obj->getRemBil(),
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
        if ($obj instanceof Bilan1) {
            $tmp = $this->find($obj->getIdBil());
            if ($tmp !== null) {
                if ($obj->getIdBil() == $tmp->getIdBil()) {
                    $query = "DELETE FROM Bilan1 WHERE bil1_id = :bil1_id";
                    $stmt = $this->bdd->prepare($query);
                    $r = $stmt->execute([
                        "bil1_id" => $obj->getIdBil()
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
        if ($obj instanceof Bilan1) {
            $tmp = $this->find($obj->getIdBil());
            if ($tmp !== null) {
                if ($obj->getIdBil() == $tmp->getIdBil()) {
                    $query = "UPDATE Bilan1 SET bil1_date_visite_ent = :bil1_date_visite_ent,bil1_note_entreprise =:bil1_note_entreprise, bil1_note_dossier = :bil1_note_dossier,bil1_note_oral = :bil1_note_oral, bil1_remarques = :bil1_remarques, etu_id = :etu_id WHERE bil1_id = :bil1_id";
                    $stmt = $this->bdd->prepare($query);
                    $dateVisite = $obj->getDatVisEnt();
                    $dateString = ($dateVisite instanceof DateTime) ? $dateVisite->format('Y-m-d H:i:s') : $dateVisite;
                    $r = $stmt->execute([
                        "bil1_date_visite_ent"=> $dateString,
                        "bil1_note_entreprise"=> $obj->getNotEnt(),
                        "bil1_note_dossier"=> $obj->getNotDosBil(),
                        "bil1_note_oral"=> $obj->getNotOraBil(),
                        "bil1_remarques"=> $obj->getRemBil(),
                        "etu_id"=> $obj->getMonEtu()->getIdUti(),
                        "bil1_id" => $obj->getIdBil()
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
        $query = "SELECT * FROM Bilan1 WHERE bil1_id = :bil1_id";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            "bil1_id" => $id
        ]);
        if ($r !== false) {
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if (!is_null($row)) {
                $etudiant = null;
                if (isset($row['etu_id'])) {
                    $etudiantmodel = new EtduiantDAO($this->bdd);
                    $etudiant = $etudiantmodel->find($row['etu_id']);
                }
                $result = new Bilan1($row['bil1_note_entreprise'], new DateTime($row['bil1_date_visite_ent']),$row['bil1_id'],$row['bil1_remarques'],$row['bil1_note_dossier'],$row['bil1_note_oral'],$etudiant);
            }
        }
        return $result;
    }

    public function getAll(): array
    {
        $query = "SELECT * FROM Bilan1";
        $stmt = $this->bdd->query($query);
        if ($stmt) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt as $row) {
                if (isset($row['etu_id'])) {
                    $etudiantmodel = new EtduiantDAO($this->bdd);
                    $etudiant = $etudiantmodel->find($row['etu_id']);
                }
                $result[] = new Bilan1($row['bil1_note_entreprise'], new DateTime($row['bil1_date_visite_ent']),$row['bil1_id'],$row['bil1_remarques'],$row['bil1_note_dossier'],$row['bil1_note_oral'],$etudiant);
            }
        } else {
            $result = [null] ;
        }

        return $result;
    }
    public function getallBilan1ByEleve(Etudiant $etudiant) : ?array
    {
        $result = [];
        $query = "SELECT * FROM Bilan1 WHERE etu_id = :etu_id";
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
                $result[] = new Bilan1($row['bil1_note_entreprise'], new DateTime($row['bil1_date_visite_ent']),$row['bil1_id'],$row['bil1_remarques'],$row['bil1_note_dossier'],$row['bil1_note_oral'],$etudiant);
            }
        }

        return $result;
    }

}