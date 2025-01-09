<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bilans Étudiant</title>
    <link rel="stylesheet" href="../Style/Style.css">
    <link rel="stylesheet" href="../Style/Bilans.css">
</head>
<body>
<div class="bilan-container">
    <div class="bilan-main">
        <h1 class="bilan-title">Bilans</h1>

        <!-- Section Bilan 1 -->
        <div class="bilan-section">
            <h2 class="bilan-subtitle">Bilan 1</h2>
            <div class="bilan-card">
                <div class="bilan-info">
                    <p>Étudiant : <?= htmlspecialchars($etudiant->getNomUti()) ?> <?= htmlspecialchars($etudiant->getPrenomUti()) ?></p>
                    <p>Année Bilan : 2024</p>
                </div>
                <a href="?action=detailsBilan1" class="bilan-details-button">Détails du bilan</a>
            </div>
        </div>

        <!-- Section Bilan 2 -->
        <div class="bilan-section">
            <h2 class="bilan-subtitle">Bilan 2</h2>
            <div class="bilan-card">
                <div class="bilan-info">
                    <p>Étudiant : <?= htmlspecialchars($etudiant->getNomUti()) ?> <?= htmlspecialchars($etudiant->getPrenomUti()) ?></p>
                    <p>Année Bilan : 2024</p>
                </div>
                <a href="?action=detailsBilan2" class="bilan-details-button">Détails du bilan</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
