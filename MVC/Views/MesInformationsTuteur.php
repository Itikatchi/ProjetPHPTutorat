<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Informations Tuteur</title>
    <link rel="stylesheet" href="../Style/Style.css">
    <link rel="stylesheet" href="../Style/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
<div class="MainContainerEtudiant">
    <div class="MainTitleEtudiant">
        <h1>Tuteur</h1>
    </div>

    <div class="DescriptionEtudiant">
        <h2>Informations détaillées</h2>
        <br>
        <?php if (!empty($tuteur)) : ?>
            <p>
                Nom et prénom : <?= htmlspecialchars($tuteur->getNomUti()) ?> <?= htmlspecialchars($tuteur->getPreNomUti()) ?><br><br>
                Numéro de téléphone : <?= htmlspecialchars($tuteur->getTutTel()) ?><br><br>
                Mail : <?= htmlspecialchars($tuteur->getEmailUti()) ?><br>
            </p>
            <a href="?action=modifiermdp" class="boutonModifMDP">Modifier votre mot de passe</a>
        <?php endif; ?>
    </div>

</div>


<div class="rightPage">
    <div class="logo">
        <img src="../Image/FSI_logo.png" class="imgFSI" alt="Logo FSI">
    </div>

    <div class="boutonModifEtudiant">
        <a href="?action=modifierinfos" class="boutonModifierInfos">Modifier vos informations</a>
    </div>

</div>
</body>
</html>
