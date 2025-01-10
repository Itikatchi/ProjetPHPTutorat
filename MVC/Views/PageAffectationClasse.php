<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affectation Tuteur/Classe</title>
    <link rel="stylesheet" href="../Style/Style.css">
</head>
<body>
<div class="MainContainer">
<div class="ajout-etudiant-container">
    <h1>Affectation Tuteur/Classe</h1>
    <form method="POST" action="?action=saveAffectationTuteurClasse" class="ajout-etudiant-form">
        <div class="ajout-etudiant-form-group">
            <label for="tuteur_id">Choisissez le tuteur :</label>
            <select id="tuteur_id" name="tuteur_id" required>
                <option value="">Sélectionner un tuteur</option>
                <?php foreach ($tuteurs as $tuteur): ?>
                    <option value="<?= htmlspecialchars($tuteur->getIdUti()) ?>">
                        <?= htmlspecialchars($tuteur->getNomUti() . " " . $tuteur->getPrenomUti()) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="ajout-etudiant-form-group">
            <label for="classe_id">Choisissez la classe :</label>
            <select id="classe_id" name="classe_id" required>
                <option value="">Sélectionner une classe</option>
                <?php foreach ($classes as $classe): ?>
                    <option value="<?= htmlspecialchars($classe->getIdCla()) ?>">
                        <?= htmlspecialchars($classe->getNomCla()) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="ajout-etudiant-form-group">
            <label for="nb_max_etu">Nombre maximum d'étudiants :</label>
            <input type="number" id="nb_max_etu" name="nb_max_etu" min="1" placeholder="Nombre maximum d'étudiants">
        </div>

        <div class="ajout-etudiant-buttons">
            <button type="submit" class="ajout-etudiant-btn ajout-etudiant-btn-ajouter">Affecter</button>
            <button type="button" class="ajout-etudiant-btn ajout-etudiant-btn-annuler"
                    onclick="window.location.href='?action=dashboard'">Annuler
            </button>
        </div>
    </form>
</div>
</div>
</body>
</html>
