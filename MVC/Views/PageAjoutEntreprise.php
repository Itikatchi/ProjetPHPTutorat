<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Informations Tuteur</title>
    <link rel="stylesheet" href="../Style/Style.css">
    <link rel="stylesheet" href="../Style/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>

<div class="MainContainerflex">
    <div class="ajout-container">
        <h1>Ajout d'une entreprise</h1>
        <form method="POST" action="?action=addEntreprise" class="ajout-etudiant-form">
            <!-- Section entreprise -->
            <div class="ajout-etudiant-form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="ajout-etudiant-form-group">
                <label for="adresse">Adresse :</label>
                <input type="text" id="adresse" name="adresse" required>
            </div>
            <div class="ajout-etudiant-form-group">
                <label for="cp">Code Postal :</label>
                <input type="text" id="cp" name="cp" required>
            </div>
            <div class="ajout-etudiant-form-group">
                <label for="ville">Ville :</label>
                <input type="text" id="ville" name="ville" required>
            </div>
    </div>

    <div class="ajout-container">
        <!-- Section maître d'apprentissage -->
        <h2>Maître d'apprentissage</h2>
        <div class="ajout-etudiant-form-group">
            <label for="nom_maitre">Nom :</label>
            <input type="text" id="nom_maitre" name="nom_maitre" required>
        </div>
        <div class="ajout-etudiant-form-group">
            <label for="prenom_maitre">Prénom :</label>
            <input type="text" id="prenom_maitre" name="prenom_maitre" required>
        </div>
        <div class="ajout-etudiant-form-group">
            <label for="email_maitre">Email :</label>
            <input type="email" id="email_maitre" name="email_maitre" required>
        </div>
        <div class="ajout-etudiant-form-group">
            <label for="tel_maitre">Téléphone :</label>
            <input type="tel" id="tel_maitre" name="tel_maitre" required>
        </div>

        <!-- Boutons -->
        <div class="ajout-etudiant-buttons">
            <button type="submit" class="ajout-etudiant-btn ajout-etudiant-btn-ajouter">Ajouter</button>
            <button type="button" class="ajout-etudiant-btn ajout-etudiant-btn-annuler"
                    onclick="window.location.href='?action=dashboard'">Annuler
            </button>
        </div>
        </form>
    </div>
</div>
</div>
</body>
</html>

