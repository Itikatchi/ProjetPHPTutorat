<?php

namespace BO;
use BO\Bilan;
require_once 'Bilan.php';
use DateTime;

class Bilan1 extends Bilan
{

    private ?float $notEnt;

    private ?DateTime $datVisEnt;


    public function __construct(?float $notEnt, ?DateTime $datVisEnt, int $idBil, ?string $remBil, ?float $notDosBil, ?float $notOraBil,Etudiant $monEtu)
    {
        parent::__construct($idBil, $remBil, $notDosBil, $notOraBil, $monEtu);

        $this->notEnt = $notEnt;
        $this->datVisEnt = $datVisEnt;
    }

    public function getNotEnt(): float
    {
        return $this->notEnt;
    }

    public function setNotEnt(float $notEnt): void
    {
        $this->notEnt = $notEnt;
    }

    public function getDatVisEnt(): DateTime
    {
        return $this->datVisEnt;
    }

    public function setDatVisEnt(DateTime $datVisEnt): void
    {
        $this->datVisEnt = $datVisEnt;
    }



}