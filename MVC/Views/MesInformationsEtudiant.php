  <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Informations Etudiant</title>
    <link rel="stylesheet" href="../Style/Style.css">
    <link rel="stylesheet" href="../Style/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link
</head>
<body>
<div class="MainContainerEtudiant">
    <?php if (!empty($etudiant) ) : ?>
    <div class="MainTitleEtudiant">
        <h1><?= htmlspecialchars($etudiant->getNomUti())?> <?= htmlspecialchars($etudiant->getPreNomUti()) ?></h1>
    </div>

    <div class="DescriptionEtudiant">
        <h2>
            Informations détaillées
        </h2>

        <br>

        <p>
            Nom et prénom : <?= htmlspecialchars($etudiant->getNomUti())?> <?= htmlspecialchars($etudiant->getPreNomUti()) ?><br><br>
            Numéro de téléphone : <?= htmlspecialchars($etudiant->getEtuTel())?><br><br>
            Adresse : <?= htmlspecialchars($etudiant->getEtuAdr()) ?> <?= htmlspecialchars($etudiant->getEtuVille()) ?> <?= htmlspecialchars($etudiant->getEtuCp()) ?><br><br>
            Classe : <?= htmlspecialchars($etudiant->getMaClasse()->getNomCla())?><br><br>
            Mail : <?= htmlspecialchars($etudiant->getEmailUti())?><br>
        </p>

        <a href="?action=modifiermdpEtu" class="boutonModifMDP">Modifier votre mot de passe</a>
    </div>

    <div class="InfosEntreprise">
        <h2>Informations entreprise</h2>
        <?php if ($etudiant->getMonEnt()) : ?>
            <?php echo($etudiant->getMonEnt()->getNomEnt()) ?><br>
            <?php echo($etudiant->getMonEnt()->getAdrEnt()) ?> <?php echo($etudiant->getMonEnt()->getCpEnt()) ?> <?php echo($etudiant->getMonEnt()->getVilEnt()) ?>
            <br>
            <?php if ($etudiant->getMonMaitreAp()) : ?>
                <?php echo($etudiant->getMonMaitreAp()->getPreMaiAppr()) ?> <?php echo($etudiant->getMonMaitreAp()->getNomMaiAppr()) ?>
                <br>
                <?php echo($etudiant->getMonMaitreAp()->getTelMaiAppr()) ?><br>
                <?php echo($etudiant->getMonMaitreAp()->getMailMaiAppr()) ?><br>
            <?php else : ?>
                <p>L'etudiant n'a pas encore de maitre d'apprentissage</p>
            <?php endif; ?>
        <?php else : ?>
            <p>L'etudiant n'a pas encore d'entreprise</p>
        <?php endif; ?>
    </div>

</div>

<div class="rightPage">
    <div class="logo">
        <img src="../Image/FSI_logo.png" class="imgFSI" alt="logoFSI">
    </div>

    <div class="boutonModifEtudiant">
        <a href="?action=modifierInfosEtu" class="boutonModifierInfos">Modifier vos informations</a>
    </div>
</div>
        <?php endif; ?>
</body>
</html>
