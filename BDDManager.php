<?php

/*function initialiseConnexionBDD() {

    $bdd = null;
    $host = 'fsiprojet.alwaysdata.net';
    $dbname = 'fsiprojet_phptutorat2025';
    $username = 'fsiprojet';
    $password = 'XQ2cd8dAPWn!zwF';

    try {
        $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username,$password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(Exception $e) {
        die('Erreur connexion BDD : '.$e->getMessage());
    }

    return $bdd;
}
*/

function initialiseConnexionBDD()
{
    $bdd = null;
    try {
        $bdd = new PDO('mysql:host=mysql-fsiprojet.alwaysdata.net;dbname=fsiprojet_phptutorat2025;charset=utf8',
            'fsiprojet',
            'XQ2cd8dAPWn!zwF'
        );
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die('Erreur connexion BDD : ' . $e->getMessage());
    }

    return $bdd;
}