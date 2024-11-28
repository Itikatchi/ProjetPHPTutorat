<?php

namespace BO;

class MaitreApprentissage
{
    private int $idMaiAppr;
    private string $nomMaiAppr;
    private string $preMaiAppr;
    private string $telMaiAppr;
    private string $mailMaiAppr;
    private Entreprise $entreprise;

    /**
     * @param int $idMaiAppr
     * @param string $nomMaiAppr
     * @param string $preMaiAppr
     * @param string $telMaiAppr
     * @param string $mailMaiAppr
     * @param Entreprise $entreprise
     */
    public function __construct(int $idMaiAppr, string $nomMaiAppr, string $preMaiAppr, string $telMaiAppr, string $mailMaiAppr, Entreprise $entreprise)
    {
        $this->idMaiAppr = $idMaiAppr;
        $this->nomMaiAppr = $nomMaiAppr;
        $this->preMaiAppr = $preMaiAppr;
        $this->telMaiAppr = $telMaiAppr;
        $this->mailMaiAppr = $mailMaiAppr;
        $this->entreprise = $entreprise;
    }

    public function getIdMaiAppr(): int
    {
        return $this->idMaiAppr;
    }

    public function setIdMaiAppr(int $idMaiAppr): void
    {
        $this->idMaiAppr = $idMaiAppr;
    }

    public function getNomMaiAppr(): string
    {
        return $this->nomMaiAppr;
    }

    public function setNomMaiAppr(string $nomMaiAppr): void
    {
        $this->nomMaiAppr = $nomMaiAppr;
    }

    public function getPreMaiAppr(): string
    {
        return $this->preMaiAppr;
    }

    public function setPreMaiAppr(string $preMaiAppr): void
    {
        $this->preMaiAppr = $preMaiAppr;
    }

    public function getTelMaiAppr(): string
    {
        return $this->telMaiAppr;
    }

    public function setTelMaiAppr(string $telMaiAppr): void
    {
        $this->telMaiAppr = $telMaiAppr;
    }

    public function getMailMaiAppr(): string
    {
        return $this->mailMaiAppr;
    }

    public function setMailMaiAppr(string $mailMaiAppr): void
    {
        $this->mailMaiAppr = $mailMaiAppr;
    }

    public function getEntreprise(): Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(Entreprise $entreprise): void
    {
        $this->entreprise = $entreprise;
    }


}