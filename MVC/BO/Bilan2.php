<?php
namespace BO;
use BO\Bilan;
require_once 'Bilan.php';
use DateTime;

class Bilan2 extends Bilan
{
    private ?string $sujBil;
    private ?DateTime $datBil2;


    public function __construct(?string $sujBil, ?DateTime $datBil2, int $idBil, ?string $remBil, ?float $notDosBil, ?float $notOraBil,Etudiant $monEtu)
    {
        parent::__construct($idBil, $remBil, $notDosBil, $notOraBil,$monEtu);
        $this->sujBil = $sujBil;
        $this->datBil2 = $datBil2;
    }

    public function getSujBil(): ?string
    {
        return $this->sujBil;
    }

    public function setSujBil(string $sujBil): void
    {
        $this->sujBil = $sujBil;
    }

    public function getDatBil2(): ?DateTime
    {
        return $this->datBil2;
    }

    public function setDatBil2(DateTime $datBil2): void
    {
        $this->datBil2 = $datBil2;
    }


}