<?php

namespace BO;

abstract class Utilisateur
{
    protected int $idUti;

    protected string $nomUti;
    protected string $prenomUti;
    protected string $emailUti;
    protected string $mdpUti;

    /**
     * @param int $idUti
     * @param string $nomUti
     * @param string $prenomUti
     * @param string $emailUti
     * @param string $mdpUti
     */
    public function __construct(int $idUti, string $nomUti, string $prenomUti, string $emailUti, string $mdpUti)
    {
        $this->idUti = $idUti;
        $this->nomUti = $nomUti;
        $this->prenomUti = $prenomUti;
        $this->emailUti = $emailUti;
        $this->mdpUti = $mdpUti;
    }

    public function getIdUti(): int
    {
        return $this->idUti;
    }

    public function setIdUti(int $idUti): void
    {
        $this->idUti = $idUti;
    }

    public function getNomUti(): string
    {
        return $this->nomUti;
    }

    public function setNomUti(string $nomUti): void
    {
        $this->nomUti = $nomUti;
    }

    public function getPrenomUti(): string
    {
        return $this->prenomUti;
    }

    public function setPrenomUti(string $prenomUti): void
    {
        $this->prenomUti = $prenomUti;
    }

    public function getEmailUti(): string
    {
        return $this->emailUti;
    }

    public function setEmailUti(string $emailUti): void
    {
        $this->emailUti = $emailUti;
    }

    public function getMdpUti(): string
    {
        return $this->mdpUti;
    }

    public function setMdpUti(string $mdpUti): void
    {
        $this->mdpUti = $mdpUti;
    }



}