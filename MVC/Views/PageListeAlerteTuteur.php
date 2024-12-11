<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Accueil Étudiant</title>
    <link rel="stylesheet" href="../Style/Style.css">
    <link rel="stylesheet" href="../Style/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>

<div class="MainContainer">
    <div class="Subtitle">
        <h2>Liste des alertes</h2>
    </div>
    <div class="TablePage">
        <table>
            <thead>
            <tr>
                <th>Motif d’alerte</th>
                <th>Nom de la personne</th>
                <th>Date de rendu initiale</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($alerte) || (!empty($alerte3)) ||(!empty($alerte2))||(!empty($alerteDATE)) ) : ?>
                <?php foreach ($alerte as $etudiant) : ?>
                    <tr>
                        <td>RETARD BILAN 1</td>
                        <td><?= htmlspecialchars($etudiant->getPrenomUti())?> <?= htmlspecialchars($etudiant->getNomUti())?></td>
                        <td><?= ($alerteDATE->getDateVisiteEnt())->format('d/m/Y') ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php foreach ($alerte2 as $etudiant) : ?>
                    <tr>
                        <td>RETARD BILAN 2</td>
                        <td><?= htmlspecialchars($etudiant->getPrenomUti())?> <?= htmlspecialchars($etudiant->getNomUti())?></td>
                        <td><?= ($alerteDATE->getDatLimBil2())->format('d/m/Y')?></td>
                    </tr>
                <?php endforeach; ?>
                <?php foreach ($alerte3 as $etudiant) : ?>
                    <tr>
                        <td>RETARD CHOIX SUJET MEMOIRE</td>
                        <td><?= htmlspecialchars($etudiant->getPrenomUti())?> <?= htmlspecialchars($etudiant->getNomUti())?></td>
                        <td><?= ($alerteDATE->getDateSujMemoire())->format('d/m/Y')?></td>

                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4">Aucune alerte trouvé.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
