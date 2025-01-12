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
                                href="./AdministrateurController.php?action=bilanetud&id=<?php echo($bilan1->getMonEtu()->getIduti()) ?>"">Retour</a>
                    </button>
                <?php elseif ($_SESSION['role'] == "etudiant") : ?>
                    <button class="boutonBack"><a
                                href="./EtudiantController.php?action=bilan&id=<?php echo($bilan1->getMonEtu()->getIduti()) ?>"">Retour</a>
                    </button>
                <?php elseif ($_SESSION['role'] == "tuteur") : ?>
                    <button class="boutonBack"><a
                                href="./TuteurController.php?action=bilanetud&id=<?php echo($bilan1->getMonEtu()->getIduti()) ?>"">Retour</a>
                    </button>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="contentBilan1">
            <?php echo($bilan1->getMonEtu()->getPrenomUti()) . " " . ($bilan1->getMonEtu()->getNomUti()) ?>
            <br>
            <?php echo "Année bilan : " . ($bilan1->getDatVisEnt()->format('Y')) ?><br>
            <?php echo "Note Oral : " . ($bilan1->getNotDosBil()) ?><br>
            <?php echo "Note Dossier : " . ($bilan1->getNotOraBil()) ?><br>
            <?php echo "Note Entreprise : " . ($bilan1->getNotEnt()) ?><br>
            <?php echo "Date de visite en entreprise : " . ($bilan1->getDatVisEnt()->format('d/m/Y')) ?><br>
            <p>REMARQUE :</p>
            <?php echo ($bilan1->getRemBil()) ?>
        </div>


    </div>

</div>
</body>
</html>