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

            <h3>Informations d'entreprise :</h3>
            <div class="form-group">
                <input type="text" name="company-name" value="Nom de l'entreprise" class="input-field" placeholder="Nom de l'entreprise" required>
            </div>
            <div class="form-group">
                <input type="text" name="company-address" value="Adresse de l'entreprise" class="input-field" placeholder="Adresse de l'entreprise" required>
            </div>
            <div class="form-group">
                <input type="text" name="contact-person" value="Nom du contact" class="input-field" placeholder="Nom du contact" required>
            </div>
            <div class="form-group">
                <input type="text" name="contact-phone" value="Téléphone et email du contact" class="input-field" placeholder="Téléphone et email du contact" required>
            </div>

            <h3>Sujet de mémoire :</h3>
            <div class="form-group">
                <textarea name="memoire" class="textarea-field" placeholder="Sujet de mémoire ici..." required></textarea>
            </div>

            <div class="Buttondown">
                <button type="button" class="boutonAnnuler">Annuler</button>
                <button type="submit" class="boutonValider">Valider les modifications</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
