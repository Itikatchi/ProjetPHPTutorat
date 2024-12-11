<?php
namespace DAO;

use BO\Alerte;

use BO\Tuteur;
use DAO\EtduiantDAO;

use PDO;
use PDOException;
use ProjetPHPTutorat\MVC\DAO\DAO;

use DateTime;
require_once 'EtduiantDAO.php';

require_once 'DAO.php';

class AlerteDAO extends DAO
{



    public function create($obj): bool
    {
        // TODO: Implement create() method.
    }

    public function delete($obj): bool
    {
        // TODO: Implement delete() method.
    }

    public function update($obj): bool
    {
        // TODO: Implement update() method.
    }

    public function find(int $id): object
    {
        $result = null;
        $query = "SELECT * FROM Alerte WHERE alerte_id = :alerte_id";
        $stmt = $this->bdd->prepare($query);
        $r = $stmt->execute([
            "alerte_id" => $id
        ]);
        if ($r !== false) {
            $row = ($tmp = $stmt->fetch(PDO::FETCH_ASSOC)) ? $tmp : null;
            if (!is_null($row)) {
                $result = new Alerte($row['alerte_id'],new DateTime($row['alerte_date_visite_entreprise'])  , new DateTime($row['alerte_date_sujet_memoire']) , new DateTime($row['alerte_date_note_bilan2']) );
            }
        }
        return $result;
    }

    public function getAll(): array
    {
        // TODO: Implement getAll() method.
    }
    public function getAllAl1ByTut(Tuteur $tut): ?array {
        $result = [];
        $al1 = $this->find(1);
        $dateOjd = new DateTime();
        if ($al1->getDateVisiteEnt() < $dateOjd) {
            $etuDAO = new EtduiantDAO($this->bdd);
            $mesEtu = $etuDAO->getAllEtuByTut($tut);
            foreach ($mesEtu as $et) {
                $bilan = $et->getMesBilan1();
                foreach ($bilan as $bil) {
                    if (is_null($bil->getRemBil())) {
                        $result[] = $et;
                    }
                }
            }
        }
        return $result;
    }
    public function getAllAl2ByTut(Tuteur $tut): ?array {
        $result = [];
        $al1 = $this->find(1);
        $dateOjd = new DateTime();
        if ($al1->getDateVisiteEnt() < $dateOjd) {
            $etuDAO = new EtduiantDAO($this->bdd);
            $mesEtu = $etuDAO->getAllEtuByTut($tut);
            foreach ($mesEtu as $et) {
                $bilan = $et->getMesBilan2();
                foreach ($bilan as $bil) {
                    if (is_null($bil->getRemBil())) {
                        $result[] = $et;
                    }
                }
            }
        }
        return $result;
    }
    public function getAllAl3ByTut(Tuteur $tut): ?array {
        $result = [];
        $al1 = $this->find(1);
        $dateOjd = new DateTime();
        if ($al1->getDateVisiteEnt() < $dateOjd) {
            $etuDAO = new EtduiantDAO($this->bdd);
            $mesEtu = $etuDAO->getAllEtuByTut($tut);
            foreach ($mesEtu as $et) {
                $bilan = $et->getMesBilan2();
                foreach ($bilan as $bil) {
                    if ($bil->getRemBil()) {
                        if(is_null($bil->getSujBil())){
                            $result[] = $et;
                        }
                    }
                }
            }
        }
        return $result;
    }

    public function getAllall1(): ?array {
        $result = [];
        $tutDAO = new TuteurDAO($this->bdd);
        $tuts = $tutDAO->getAll();
        if ($tuts) {
            foreach ($tuts as $tut) {
                $mesEtu = $this->getAllAl1ByTut($tut);
                foreach ($mesEtu as $et) {
                    $result[] = $et;
                }
            }
        }
        return $result;
    }
    public function getAllall2(): ?array {
        $result = [];
        $tutDAO = new TuteurDAO($this->bdd);
        $tuts = $tutDAO->getAll();
        if ($tuts) {
            foreach ($tuts as $tut) {
                $mesEtu = $this->getAllAl2ByTut($tut);
                foreach ($mesEtu as $et) {
                    $result[] = $et;
                }
            }
        }
        return $result;

    }
    public function getAllall3(): ?array {
        $result = [];
        $tutDAO = new TuteurDAO($this->bdd);
        $tuts = $tutDAO->getAll();
        if ($tuts) {
            foreach ($tuts as $tut) {
                $mesEtu = $this->getAllAl3ByTut($tut);
                foreach ($mesEtu as $et) {
                    $result[] = $et;
                }
            }
        }
        return $result;

    }
}