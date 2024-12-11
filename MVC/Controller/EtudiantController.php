<?php
namespace Controller;

class EtudiantController
{
    public function dashboard()
    {
        try {
            $this->ensureLoggedInAs('etudiant');

            $prenom = htmlspecialchars($_SESSION['Prenom'] ?? "", ENT_QUOTES, 'UTF-8');
            $nom = htmlspecialchars($_SESSION['Nom'] ?? "", ENT_QUOTES, 'UTF-8');

            include "../Views/Nav/NavEtudiant.php";
            include "../Views/PageAccueilEtudiant.php";
        } catch (\Exception $e) {

            $this->redirectWithError($e->getMessage());
        }
    }

    private function ensureLoggedInAs($role)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }


        if (!isset($_SESSION['role']) || $_SESSION['role'] !== $role) {
            throw new \Exception("Vous devez être connecté en tant que $role pour accéder à cette page.");
        }
    }

    private function redirectWithError($message)
    {

        header("Location: ../../index.php?error=" . urlencode($message));
        exit;
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        (new EtudiantController())->dashboard();
    } catch (\Exception $e) {

        header("Location: ../../index.php?error=" . urlencode("Erreur inattendue : " . $e->getMessage()));
        exit;
    }

    exit;
}
