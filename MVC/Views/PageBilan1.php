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
            <?php if (!empty($etudiants)|| !empty($bilan1)) : ?>
                <div class="PannelBilan">
                    Bilan 1
                </div>
                <button class="boutonBack"><a href="./AdministrateurController.php?action=bilanetud&id=<?=htmlspecialchars($etudiants->getIduti())?>"">Retour</a></button>
            <?php endif; ?>
        </div>
        <div class="contentBilan1">
            <?= htmlspecialchars($etudiants->getPrenomUti()) ." ". htmlspecialchars($etudiants->getNomUti()) ?>
            <?= "Année bilan :". htmlspecialchars($etudiants->getNomUti()) ?>
        </div>



    </div>

</div>
</body>
</html>