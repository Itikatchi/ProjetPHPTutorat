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
    <div class="BilanPageConsultation">
        <div class="BilanConsultation">
            <?php if (!empty($bilan2)) : ?>
                <div class="PannelBilan">
                    Bilan 2
                </div>
            <?php if ($_SESSION['role'] == "administrateur") : ?>
            <button class="boutonBack"><a
                        href="./AdministrateurController.php?action=bilanetud&id=<?= htmlspecialchars($bilan2->getMonEtu()->getIduti()) ?>"">Retour</a>
            </button>
            <?php elseif ($_SESSION['role'] == "etudiant") : ?>
            <button class="boutonBack"><a
                        href="./EtudiantController.php?action=bilan&id=<?= htmlspecialchars($bilan2->getMonEtu()->getIduti()) ?>"">Retour</a>
            </button>
            <?php elseif ($_SESSION['role'] == "tuteur") : ?>
            <button class="boutonBack"><a
                        href="./TuteurController.php?action=bilanetud&id=<?= htmlspecialchars($bilan2->getMonEtu()->getIduti()) ?>"">Retour</a>
            </button>
            <?php endif; ?>

            <?php endif; ?>

        </div>
        <div class="contentBilan2">
            <?= htmlspecialchars($bilan2->getMonEtu()->getPrenomUti()) . " " . htmlspecialchars($bilan2->getMonEtu()->getNomUti()) ?><br>
            <?= "Année bilan : " . htmlspecialchars($bilan2->getDatBil2()->format('Y')) ?><br>
            <?= "Note Oral : " . htmlspecialchars($bilan2->getNotDosBil()) ?><br>
            <?= "Note Dossier : " . htmlspecialchars($bilan2->getNotOraBil()) ?><br>
            <?= "Date Bilan 2 : " . htmlspecialchars($bilan2->getDatBil2()->format('d/m/Y')) ?><br>

            <?php echo("Sujet du memoire :<br>");
                    if (($bilan2->getSujBil())!= null){
                        echo htmlspecialchars($bilan2->getSujBil());
                    }else{
                        echo ("L'etudiant n'a pas encore de sujet de memoire");
                    }
             ?>
            <p>REMARQUE :</p>
            <?=  htmlspecialchars($bilan2->getRemBil()) ?>
        </div>


    </div>

</div>
</body>
</html>