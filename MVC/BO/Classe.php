<?php

namespace BO;

class Classe
{
    private int $idCla;
    private string $nomCla;

    /**
     * @param int $idCla
     * @param string $nomCla
     */
    public function __construct(int $idCla, string $nomCla)
    {
        $this->idCla = $idCla;
        $this->nomCla = $nomCla;
    }

    public function getIdCla(): int
    {
        return $this->idCla;
    }

    public function setIdCla(int $idCla): void
    {
        $this->idCla = $idCla;
    }

    public function getNomCla(): string
    {
        return $this->nomCla;
    }

    public function setNomCla(string $nomCla): void
    {
        $this->nomCla = $nomCla;
    }


}