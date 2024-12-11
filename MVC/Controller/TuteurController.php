<?php
namespace Controller;

class TuteurController
{
    public function dashboard()
    {
        try {
            $this->ensureLoggedInAs('tuteur');

            $prenom = htmlspecialchars($_SESSION['Prenom'] ?? "", ENT_QUOTES, 'UTF-8');
            $nom = htmlspecialchars($_SESSION['Nom'] ?? "", ENT_QUOTES, 'UTF-8');

            include "../Views/Nav/NavTuteur.php";
            include "../Views/PageAccueilTuteur.php";
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
        (new TuteurController())->dashboard();
    } catch (\Exception $e) {

        header("Location: ../../index.php?error=" . urlencode("Erreur inattendue : " . $e->getMessage()));
        exit;
    }

    exit;
}
