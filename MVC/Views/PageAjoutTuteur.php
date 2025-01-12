<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Tuteur</title>
    <link rel="stylesheet" href="../Style/Style.css">
</head>
<body>
<div class="MainContainerflex">
    <div class="ajout-container">
        <h1>Ajout tuteur</h1>
        <form method="POST" action="?action=addTuteur" class="ajout-etudiant-form">
            <div class="ajout-etudiant-form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="ajout-etudiant-form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div class="ajout-etudiant-form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="ajout-etudiant-form-group">
                <label for="mdp">Mot de passe :</label>
                <input type="password" id="mdp" name="mdp" required>
            </div>
            <div class="ajout-etudiant-form-group">
                <label for="tel">Téléphone :</label>
                <input type="tel" id="tel" name="tel" required>
            </div>

            <div class="ajout-etudiant-buttons">
                <button type="submit" class="ajout-etudiant-btn ajout-etudiant-btn-ajouter">Ajouter</button>
                <button type="button" class="ajout-etudiant-btn ajout-etudiant-btn-annuler"
                        onclick="window.location.href='?action=parametrage'">Annuler
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
