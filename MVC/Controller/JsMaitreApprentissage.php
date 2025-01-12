<?php
namespace Controller;
require_once "../BDDManager.php";
require_once "../DAO/MaitreApprentissageDAO.php";
use DAO\MaitreApprentissageDAO;
require_once "../BO/MaitreApprentissage.php";

try {
    if (!isset($_GET['entreprise_id']) || empty($_GET['entreprise_id'])) {
        throw new Exception("ID de l'entreprise manquant.");
    }

    $entrepriseId = (int)$_GET['entreprise_id'];
    $bdd = initialiseConnexionBDD();
    $maitreDAO = new MaitreApprentissageDAO($bdd);
    $maitres = $maitreDAO->getByEntrepriseId($entrepriseId);

    $result = array_map(function ($maitre) {
        return [
            'id' => $maitre->getIdMaiAppr(),
            'prenom' => $maitre->getPreMaiAppr(),
            'nom' => $maitre->getNomMaiAppr(),
        ];
    }, $maitres);

    echo json_encode($result);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
    http_response_code(400);
}



