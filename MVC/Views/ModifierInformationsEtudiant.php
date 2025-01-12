<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modification Etudiant</title>
    <link rel="stylesheet" href="../Style/Style.css">
</head>
<body>
<div class="MainContainerflex">
    <div class="ajout-container">
        <div class="modifetudiant-title">
            <h1>Modification Etudiant</h1>
        </div>
        <div class="modifetudiant-content">
            <h2 class="modifetudiant-header">Modifier mes informations</h2>
            <form method="POST" action="?action=saveinfoEtu" class="ajout-etudiant-form">
                <div class="ajout-etudiant-form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nomEtu" name="nom"
                           value="<?= htmlspecialchars($etudiant->getNomUti()) ?>" placeholder="Nom" required>
                </div>
                <div class="ajout-etudiant-form-group">
                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenomEtu" name="prenom"
                           value="<?= htmlspecialchars($etudiant->getPrenomUti()) ?>" placeholder="Prénom" required>
                </div>
                <div class="ajout-etudiant-form-group">
                    <label for="telephone">Téléphone :</label>
                    <input type="text" id="telephoneEtu" name="telephone"
                           value="<?= htmlspecialchars($etudiant->getEtuTel()) ?>" placeholder="Téléphone" required>
                </div>
                <div class="ajout-etudiant-form-group">
                    <label for="email">Email :</label>
                    <input type="email" id="emailEtu" name="email"
                           value="<?= htmlspecialchars($etudiant->getEmailUti()) ?>" placeholder="Email" required>
                </div>
        </div>
    </div>
        <div class="ajout-container">
            <div class="ajout-etudiant-form-group">
                <label for="adrEtu">Adresse :</label>
                <input type="text" id="adrEtu" name="adresse"
                       value="<?= htmlspecialchars($etudiant->getEtuAdr()) ?>" placeholder="Adresse" required>
            </div>
            <div class="ajout-etudiant-form-group">
                <label for="cpEtu">Code postal :</label>
                <input type="text" id="cpEtu" name="cp" value="<?= htmlspecialchars($etudiant->getEtuCp()) ?>"
                       placeholder="Code postal" required>
            </div>
            <div class="ajout-etudiant-form-group">
                <label for="villeEtu">Ville :</label>
                <input type="text" id="villeEtu" name="ville"
                       value="<?= htmlspecialchars($etudiant->getEtuVille()) ?>" placeholder="Ville" required>
            </div>
            <div class="modifetudiant-buttons">
                <button style="cursor: pointer;" class="ajout-etudiant-btn ajout-etudiant-btn-ajouter">Modifier</button>
                <button type="button" class="ajout-etudiant-btn ajout-etudiant-btn-annuler"
                        onclick="window.location.href='?action=mesinfo'">Annuler
                </button>

            </div>
        </div>
        </form>
    </div>
</div>
</div>
</div>
</body>
</html>

