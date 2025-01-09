<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modification du Mot de Passe</title>
    <link rel="stylesheet" href="../Style/Style.css">
</head>
<body>


<div class="modifetudiant-main">
    <div class="modifetudiant-title">
        <h1>Modification du Mot de Passe</h1>
    </div>

    <div class="modifetudiant-form-container">
        <form method="POST" action="?action=savemdpetu" class="modifetudiant-form">
            <h2 class="modifetudiant-header">Changer mon mot de passe</h2>

            <div class="modifetudiant-form-group">
                <label for="old-password" class="modifetudiant-label">Ancien mot de passe :</label>
                <input type="password" id="old-password" name="old_password" class="modifetudiant-input" placeholder="Entrez votre ancien mot de passe" required>
            </div>

            <div class="modifetudiant-form-group">
                <label for="new-password" class="modifetudiant-label">Nouveau mot de passe :</label>
                <input type="password" id="new-password" name="new_password" class="modifetudiant-input" placeholder="Entrez votre nouveau mot de passe" required>
            </div>

            <div class="modifetudiant-buttons">
                <a href="?action=mesinfo" class="modifetudiant-button modifetudiant-cancel">Annuler</a>
                <button style="cursor: pointer;" class="modifetudiant-button modifetudiant-submit">Modifier</button>
            </div>
        </form>
    </div>
</div>
</div>
</body>
</html>