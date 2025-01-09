
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


    <div class="modiftuteur-main">
        <div class="modiftuteur-title">
            <h1>Modification du Mot de Passe</h1>
        </div>

        <div class="modiftuteur-form-container">
            <form method="POST" action="?action=savemdp" class="modiftuteur-form">
                <h2 class="modiftuteur-header">Changer mon mot de passe</h2>

                <div class="modiftuteur-form-group">
                    <label for="old-password" class="modiftuteur-label">Ancien mot de passe :</label>
                    <input type="password" id="old-password" name="old_password" class="modiftuteur-input" placeholder="Entrez votre ancien mot de passe" required>
                </div>

                <div class="modiftuteur-form-group">
                    <label for="new-password" class="modiftuteur-label">Nouveau mot de passe :</label>
                    <input type="password" id="new-password" name="new_password" class="modiftuteur-input" placeholder="Entrez votre nouveau mot de passe" required>
                </div>

                <div class="modiftuteur-buttons">
                    <a href="?action=mesinfo" class="modiftuteur-button modiftuteur-cancel">Annuler</a>
                    <button style="cursor: pointer;" type="submit" class="modiftuteur-button modiftuteur-submit">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
