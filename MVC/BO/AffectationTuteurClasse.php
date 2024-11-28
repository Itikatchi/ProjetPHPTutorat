<?php

namespace BO;

class AffectationTuteurClasse
{
    private Tuteur $tuteur;

    private Classe $classe;
    private int $nbMaxEtu;

    /**
     * @param Tuteur $tuteur
     * @param Classe $classe
     * @param int $nbMaxEtu
     */
    public function __construct(Tuteur $tuteur, Classe $classe, int $nbMaxEtu)
    {
        $this->tuteur = $tuteur;
        $this->classe = $classe;
        $this->nbMaxEtu = $nbMaxEtu;
    }

    public function getTuteur(): Tuteur
    {
        return $this->tuteur;
    }

    public function setTuteur(Tuteur $tuteur): void
    {
        $this->tuteur = $tuteur;
    }

    public function getClasse(): Classe
    {
        return $this->classe;
    }

    public function setClasse(Classe $classe): void
    {
        $this->classe = $classe;
    }

    public function getNbMaxEtu(): int
    {
        return $this->nbMaxEtu;
    }

    public function setNbMaxEtu(int $nbMaxEtu): void
    {
        $this->nbMaxEtu = $nbMaxEtu;
    }


}