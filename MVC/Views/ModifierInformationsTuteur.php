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
<div class="modiftuteur-container">
    <div class="modiftuteur-main">
        <div class="modiftuteur-title">
            <h1>Modification Tuteur</h1>
        </div>
        <div class="modiftuteur-content">
            <h2 class="modiftuteur-header">Modifier mes informations</h2>
            <form method="POST" action="?action=saveinfo" class="modiftuteur-form">
                <div class="modiftuteur-form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($tuteur->getNomUti()) ?>" placeholder="Nom" required>
                </div>
                <div class="modiftuteur-form-group">
                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($tuteur->getPrenomUti()) ?>" placeholder="Prénom" required>
                </div>
                <div class="modiftuteur-form-group">
                    <label for="telephone">Téléphone :</label>
                    <input type="text" id="telephone" name="telephone" value="<?= htmlspecialchars($tuteur->getTutTel()) ?>" placeholder="Téléphone" required>
                </div>
                <div class="modiftuteur-form-group">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($tuteur->getEmailUti()) ?>" placeholder="Email" required>
                </div>
                <div class="modiftuteur-buttons">
                    <a href="?action=mesinfo" class="modiftuteur-button modiftuteur-cancel">Annuler</a>
                    <button type="submit" class="modiftuteur-button modiftuteur-submit">Valider les modifications</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
