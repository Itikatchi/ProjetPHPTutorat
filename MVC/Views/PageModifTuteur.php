<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification tuteur</title>
    <link rel="stylesheet" href="../Style/Style.css">
</head>
<body>
<div class="MainContainerflex">
    <div class="ajout-container">
        <div class="modifetudiant-title">
            <h1>Modification Tuteur</h1>
        </div>
        <div class="modifetudiant-content">
            <h2 class="modifetudiant-header">Modifier les informations</h2>
            <form method="POST" action="?action=saveinfoTut" class="ajout-etudiant-form">
                <input type="hidden" name="id" value="<?= $tuteur->getIdUti(); ?>">
                <div class="ajout-etudiant-form-group">
                    <label for="prenom">Prenom :</label>
                    <input type="text" id="tut_pre" name="tut_pre"
                           value="<?= htmlspecialchars($tuteur->getPrenomUti()) ?>" placeholder="Prenom" required>
                </div>
                <div class="ajout-etudiant-form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" id="tut_nom" name="tut_nom"
                           value="<?= htmlspecialchars($tuteur->getNomUti()) ?>" placeholder="Nom" required>
                </div>
                <div class="ajout-etudiant-form-group">
                    <label for="mdp">Mot de passe :</label>
                    <input type="text" id=tut_mdp name="tut_mdp"
                           value="<?= htmlspecialchars($tuteur->getMdpUti()) ?>" placeholder="Mot de passe" required>
                </div>
                <div class="ajout-etudiant-form-group">
                    <label for="tel">Téléphone :</label>
                    <input type="text" id=tut_tel name="tut_tel"
                           value="<?= htmlspecialchars($tuteur->getTutTel()) ?>" placeholder="Téléphone" required>
                </div>
                <div class="ajout-etudiant-form-group">
                    <label for="email">Email :</label>
                    <input type="email" id="tut_email" name="tut_email"
                           value="<?= htmlspecialchars($tuteur->getEmailUti()) ?>" placeholder="Email" required>
                </div>

                <div class="modifetudiant-buttons">
                    <button style="cursor: pointer;" class="ajout-etudiant-btn ajout-etudiant-btn-ajouter">Modifier</button>
                    <button type="button" class="ajout-etudiant-btn ajout-etudiant-btn-annuler"
                            onclick="window.location.href='?action=parametrage'">Annuler
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

</body>