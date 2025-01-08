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
        <h1>Modifier mes informations</h1>
    </div>

    <div class="FormContainer">
        <form method="POST" action="?action=saveinfo">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($tuteur->getNomUti()) ?>" required><br><br>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($tuteur->getPrenomUti()) ?>" required><br><br>

            <label for="telephone">Numéro de téléphone :</label>
            <input type="text" id="telephone" name="telephone" value="<?= htmlspecialchars($tuteur->getTutTel()) ?>" required><br><br>

            <label for="email">Mail :</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($tuteur->getEmailUti()) ?>" required><br><br>

            <button type="submit" class="boutonSauvegarder">Sauvegarder</button>
        </form>
    </div>
</div>
</body>
</html>
