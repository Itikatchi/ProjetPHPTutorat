<?php
function initialiseConnexionBDD() {
    $bdd = null;
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=phptutorat;charset=utf8',
            'root',
            ''
        );
    } catch(Exception $e) {
        die('Erreur connexion BDD : '.$e->getMessage());
    }

    return $bdd;
}
