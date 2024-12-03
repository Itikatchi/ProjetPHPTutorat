<?php

namespace BO;
use BO\Utilisateur;
require_once 'Utilisateur.php';
class Tuteur extends Utilisateur
{
    private string $tut_tel;

    private int $tut_nb_etu;


    public function __construct(string $tut_tel, int $tut_nb_etu, int $idUti, string $nomUti, string $prenomUti, string $emailUti, string $mdpUti)
    {
        parent::__construct(
            $idUti,
            $nomUti,
            $prenomUti,
            $emailUti,
            $mdpUti
        );
        $this->tut_tel = $tut_tel;
        $this->tut_nb_etu = $tut_nb_etu;
    }

    public function getTutTel(): string
    {
        return $this->tut_tel;
    }

    public function setTutTel(string $tut_tel): void
    {
        $this->tut_tel = $tut_tel;
    }

    public function getTutNbEtu(): int
    {
        return $this->tut_nb_etu;
    }

    public function setTutNbEtu(int $tut_nb_etu): void
    {
        $this->tut_nb_etu = $tut_nb_etu;
    }


}