<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/Style.css">
    <link rel="stylesheet" href="../Style/reset.css">
    <title>Liste des Étudiants</title>
</head>
<body>
<h1>Liste des Étudiants</h1>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($etudiants)) : ?>
        <?php foreach ($etudiants as $etudiant) : ?>
            <tr>
                <td><?= htmlspecialchars($etudiant->getIduti()) ?></td>
                <td><?= htmlspecialchars($etudiant->getNomUti()) ?></td>
                <td><?= htmlspecialchars($etudiant->getPrenomUti()) ?></td>
                <td><?= htmlspecialchars($etudiant->getEmailUti()) ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="4">Aucun étudiant trouvé.</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
</body>
</html>
