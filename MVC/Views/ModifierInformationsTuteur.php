<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier Informations Tuteur</title>
    <link rel="stylesheet" href="../Style/Style.css">
</head>
<body>
<div class="MainContainerEtudiant">
    <div class="MainTitleEtudiant">
        <h1>Modification :</h1>
    </div>

    <div class="FormContainer">
        <h2 class="form-title">Modifier mes informations</h2>
        <form method="POST" action="?action=saveinfo">
            <div class="form-group">
                <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($tuteur->getNomUti()) ?>" placeholder="Nom" required>
            </div>
            <div class="form-group">
                <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($tuteur->getPrenomUti()) ?>" placeholder="Prénom" required>
            </div>
            <div class="form-group">
                <input type="text" id="telephone" name="telephone" value="<?= htmlspecialchars($tuteur->getTutTel()) ?>" placeholder="Numéro de téléphone" required>
            </div>
            <div class="form-group">
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($tuteur->getEmailUti()) ?>" placeholder="Email" required>
            </div>


            <div class="Buttondown">
                <a href="?action=mesinfo" class="boutonAnnuler">Annuler</a>
                <button type="submit" class="boutonValider">Valider les modifications</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
