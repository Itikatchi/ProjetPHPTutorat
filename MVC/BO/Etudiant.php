<?php
namespace BO;
use BO\Utilisateur;
require_once 'Utilisateur.php';
use DateTime;

class Etudiant extends Utilisateur
{

    private ?Tuteur $monTuteur;
    private ?Specialite $maSpec;
    private ?Classe $maClasse;
    private ?MaitreApprentissage $monMaitreAp;
    private ?Entreprise $monEnt;

    private string $etu_tel;
    private string $etu_adr;
    private string $etu_ville;
    private string $etu_cp;

    private array $mesBilan1;
    private array $mesBilan2;

    public function __construct(Tuteur $monTuteur, Specialite $maSpec, Classe $maClasse, MaitreApprentissage $monMaitreAp, Entreprise $monEnt,
                                int $idUti, string $nomUti, string $prenomUti, string $emailUti, string $mdpUti,string $etu_tel,
                                string $etu_adr,string $etu_ville,string $etu_cp)
    {
        parent::__construct(
            $idUti,
            $nomUti,
            $prenomUti,
            $emailUti,
            $mdpUti
        );
        $this->monTuteur = $monTuteur;
        $this->maSpec = $maSpec;
        $this->maClasse = $maClasse;
        $this->monMaitreAp = $monMaitreAp;
        $this->monEnt = $monEnt;
        $this->etu_tel = $etu_tel;
        $this->etu_adr = $etu_adr;
        $this->etu_ville = $etu_ville;
        $this->etu_cp = $etu_cp;
        $this->mesBilan1 = [null];
        $this->mesBilan2 = [null];
    }

    public function getMonTuteur(): ?Tuteur
    {
        return $this->monTuteur;
    }

    public function setMonTuteur(?Tuteur $monTuteur): void
    {
        $this->monTuteur = $monTuteur;
    }

    public function getMaSpec(): ?Specialite
    {
        return $this->maSpec;
    }

    public function setMaSpec(?Specialite $maSpec): void
    {
        $this->maSpec = $maSpec;
    }

    public function getMaClasse(): ?Classe
    {
        return $this->maClasse;
    }

    public function setMaClasse(?Classe $maClasse): void
    {
        $this->maClasse = $maClasse;
    }

    public function getMonMaitreAp(): ?MaitreApprentissage
    {
        return $this->monMaitreAp;
    }

    public function setMonMaitreAp(?MaitreApprentissage $monMaitreAp): void
    {
        $this->monMaitreAp = $monMaitreAp;
    }

    public function getMonEnt(): ?Entreprise
    {
        return $this->monEnt;
    }

    public function setMonEnt(?Entreprise $monEnt): void
    {
        $this->monEnt = $monEnt;
    }

    public function getEtuTel(): string
    {
        return $this->etu_tel;
    }

    public function setEtuTel(string $etu_tel): void
    {
        $this->etu_tel = $etu_tel;
    }

    public function getEtuAdr(): string
    {
        return $this->etu_adr;
    }

    public function setEtuAdr(string $etu_adr): void
    {
        $this->etu_adr = $etu_adr;
    }

    public function getEtuVille(): string
    {
        return $this->etu_ville;
    }

    public function setEtuVille(string $etu_ville): void
    {
        $this->etu_ville = $etu_ville;
    }

    public function getEtuCp(): string
    {
        return $this->etu_cp;
    }

    public function setEtuCp(string $etu_cp): void
    {
        $this->etu_cp = $etu_cp;
    }

    public function getMesBilan1(): array
    {
        return $this->mesBilan1;
    }

    public function setMesBilan1(array $mesBilan1): void
    {
        $this->mesBilan1 = $mesBilan1;
    }

    public function getMesBilan2(): array
    {
        return $this->mesBilan2;
    }

    public function setMesBilan2(array $mesBilan2): void
    {
        $this->mesBilan2 = $mesBilan2;
    }




}