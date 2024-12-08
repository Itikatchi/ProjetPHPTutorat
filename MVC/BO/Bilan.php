<?php

namespace BO;

use DateTime;

abstract class Bilan
{
    protected int $idBil;
    protected string $remBil;
    protected float $notDosBil;
    protected float $notOraBil;
    protected ?Etudiant $monEtu;

    public function __construct(int $idBil, string $remBil, float $notDosBil, float $notOraBil, Etudiant $monEtu)
    {
        $this->idBil = $idBil;
        $this->remBil = $remBil;
        $this->notDosBil = $notDosBil;
        $this->notOraBil = $notOraBil;
        $this->monEtu = $monEtu;
    }

    public function getIdBil(): int
    {
        return $this->idBil;
    }

    public function setIdBil(int $idBil): void
    {
        $this->idBil = $idBil;
    }

    public function getRemBil(): string
    {
        return $this->remBil;
    }

    public function setRemBil(string $remBil): void
    {
        $this->remBil = $remBil;
    }

    public function getNotBil(): float
    {
        return $this->notBil;
    }

    public function setNotBil(float $notBil): void
    {
        $this->notBil = $notBil;
    }

    public function getNotOra(): float
    {
        return $this->notOra;
    }

    public function setNotOra(float $notOra): void
    {
        $this->notOra = $notOra;
    }

    public function getMonEtu(): Etudiant
    {
        return $this->monEtu;
    }

    public function setMonEtu(Etudiant $monEtu): void
    {
        $this->monEtu = $monEtu;
    }


}