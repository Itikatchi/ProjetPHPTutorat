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
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
          rel="stylesheet">
</head>
<body>
<div class="MainContainer">
    <div class="BilanPageConsultation">
        <div class="BilanConsultation">
            <?php if (!empty($bilan1)) : ?>
                <div class="PannelBilan">
                    Bilan 1
                </div>
                <?php if ($_SESSION['role'] == "administrateur") : ?>
                    <button class="boutonBack"><a
                                href="./AdministrateurController.php?action=bilanetud&id=<?= htmlspecialchars($bilan1->getMonEtu()->getIduti()) ?>"">Retour</a>
                    </button>
                <?php elseif ($_SESSION['role'] == "etudiant") : ?>
                    <button class="boutonBack"><a
                                href="./EtudiantController.php?action=bilan&id=<?= htmlspecialchars($bilan1->getMonEtu()->getIduti()) ?>"">Retour</a>
                    </button>
                <?php elseif ($_SESSION['role'] == "tuteur") : ?>
                    <button class="boutonBack"><a
                                href="./AdministrateurController.php?action=bilanetud&id=<?= htmlspecialchars($bilan1->getMonEtu()->getIduti()) ?>"">Retour</a>
                    </button>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="contentBilan1">
            <?= htmlspecialchars($bilan1->getMonEtu()->getPrenomUti()) . " " . htmlspecialchars($bilan1->getMonEtu()->getNomUti()) ?>
            <br>
            <?= "Année bilan : " . htmlspecialchars($bilan1->getDatVisEnt()->format('Y')) ?><br>
            <?= "Note Oral : " . htmlspecialchars($bilan1->getNotDosBil()) ?><br>
            <?= "Note Dossier : " . htmlspecialchars($bilan1->getNotOraBil()) ?><br>
            <?= "Note Entreprise : " . htmlspecialchars($bilan1->getNotEnt()) ?><br>
            <?= "Date de visite en entreprise : " . htmlspecialchars($bilan1->getDatVisEnt()->format('d/m/Y')) ?><br>
            <p>REMARQUE :</p>
            <?= htmlspecialchars($bilan1->getRemBil()) ?>
        </div>


    </div>

</div>
</body>
</html>