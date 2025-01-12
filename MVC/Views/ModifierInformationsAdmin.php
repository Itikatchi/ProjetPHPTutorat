<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modification Tuteur</title>
    <link rel="stylesheet" href="../Style/Style.css">
</head>
<body>
<div class="MainContainerflex">
    <div class="ajout-container">
        <div class="modiftuteur-title">
            <h1>Modification Tuteur</h1>
        </div>
        <div class="modiftuteur-content">
            <h2 class="modiftuteur-header">Modifier mes informations</h2>
            <form method="POST" action="?action=saveinfo" class="ajout-etudiant-form">
                <div class="ajout-etudiant-form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($admin->getNomUti()) ?>" placeholder="Nom" required>
                </div>
                <div class="ajout-etudiant-form-group">
                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($admin->getPrenomUti()) ?>" placeholder="Prénom" required>
                </div>
                <div class="ajout-etudiant-form-group">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($admin->getEmailUti()) ?>" placeholder="Email" required>
                </div>
                <div class="modifetudiant-buttons">
                    <button style="cursor: pointer;" class="ajout-etudiant-btn ajout-etudiant-btn-ajouter">Modifier</button>
                    <button type="button" class="ajout-etudiant-btn ajout-etudiant-btn-annuler"
                            onclick="window.location.href='?action=mesinfo'">Annuler
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
