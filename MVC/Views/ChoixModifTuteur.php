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
        <h1>Choix du tuteur à modifier</h1>
        <form method="GET" action="" class="ajout-etudiant-form">
            <div class="ajout-etudiant-form-group">
                <label for="id_tut">Sélectionnez un tuteur :</label>
                <select id="id_tut" name="id" required>
                    <option value="">--Choisir--</option>
                    <?php foreach ($tuteurs as $tuteur): ?>
                        <option value="<?= $tuteur->getIdUti(); ?>"><?= htmlspecialchars($tuteur->getNomUti()); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Champ caché pour l'action -->
            <input type="hidden" name="action" value="modifTuteur">

            <div class="ajout-etudiant-buttons">
                <button type="submit" class="ajout-etudiant-btn ajout-etudiant-btn-ajouter">Modifier</button>
                <button type="button" class="ajout-etudiant-btn ajout-etudiant-btn-annuler"
                        onclick="window.location.href='?action=parametrage';">
                    Annuler
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
