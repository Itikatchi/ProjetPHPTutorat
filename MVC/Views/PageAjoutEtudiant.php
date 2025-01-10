<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Étudiant</title>
    <link rel="stylesheet" href="../Style/Style.css">
</head>
<body>
<div class="MainContainerflex">
    <div class="ajout-container">
        <h1>Ajout étudiant</h1>
        <form method="POST" action="?action=addEtudiant" class="ajout-etudiant-form">
            <div class="ajout-etudiant-form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="ajout-etudiant-form-group">
                <label for="prenom">Prenom :</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div class="ajout-etudiant-form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="ajout-etudiant-form-group">
                <label for="mdp">Mot de passe de base :</label>
                <input type="password" id="mdp" name="mdp" required>
            </div>
            <div class="ajout-etudiant-form-group">
                <label for="tel">Tel :</label>
                <input type="tel" id="tel" name="tel" required>
            </div>
    </div>
    <div class="ajout-container">
        <div class="ajout-etudiant-form-group">
            <label for="adresse">Adresse :</label>
            <input type="text" id="adresse" name="adresse" required>
        </div>
        <div class="ajout-etudiant-form-group">
            <label for="code_postal">Code Postal :</label>
            <input type="text" id="code_postal" name="code_postal" required>
        </div>
        <div class="ajout-etudiant-form-group">
            <label for="ville">Ville :</label>
            <input type="text" id="ville" name="ville" required>
        </div>

        <div class="ajout-etudiant-form-group">
            <label for="specialite">Spécialité :</label>
            <select id="specialite" name="specialite" required>
                <option value="">--Choisir--</option>
                <?php foreach ($specialites as $specialite): ?>
                    <option value="<?= htmlspecialchars($specialite->getIdSpec()) ?>">
                        <?= htmlspecialchars($specialite->getNomSpec()) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="ajout-etudiant-form-group">
            <label for="classe">Classe :</label>
            <select id="classe" name="classe" required>
                <option value="">--Choisir--</option>
                <?php foreach ($classes as $classe): ?>
                    <option value="<?= htmlspecialchars($classe->getIdCla()) ?>">
                        <?= htmlspecialchars($classe->getNomCla()) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="ajout-etudiant-form-group">
            <label for="tuteur">Tuteur :</label>
            <select id="tuteur" name="tuteur">
                <option value="">--Choisir--</option>
                <?php foreach ($tuteurs as $tuteur): ?>
                    <option value="<?= htmlspecialchars($tuteur->getIdUti()) ?>">
                        <?= htmlspecialchars($tuteur->getNomUti() . " " . $tuteur->getPrenomUti()) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="ajout-etudiant-form-group">
            <label for="entreprise">Entreprise :</label>
            <select id="entreprise" name="entreprise">
                <option value="">--Choisir--</option>
                <?php foreach ($entreprises as $entreprise): ?>
                    <option value="<?= htmlspecialchars($entreprise->getIdEnt()) ?>">
                        <?= htmlspecialchars($entreprise->getNomEnt()) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="ajout-etudiant-buttons">
            <button type="submit" class="ajout-etudiant-btn ajout-etudiant-btn-ajouter">Ajouter</button>
            <button type="button" class="ajout-etudiant-btn ajout-etudiant-btn-annuler"
                    onclick="window.location.href='?action=dashboard'">Annuler
            </button>
        </div>
        </form>
    </div>
</div>
</body>
</html>
