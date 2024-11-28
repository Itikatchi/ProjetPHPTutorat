<?php

namespace BO;

use BO\Utilisateur;
require_once 'Utilisateur.php';

class Administrateur extends Utilisateur
{
    /**
     * @param int $idUti
     * @param string $nomUti
     * @param string $prenomUti
     * @param string $emailUti
     * @param string $mdpUti
     */
    public function __construct(int $idUti, string $nomUti, string $prenomUti, string $emailUti, string $mdpUti)
    {
        parent::__construct(
            $idUti,
            $nomUti,
            $prenomUti,
            $emailUti,
            $mdpUti
        );
    }

}