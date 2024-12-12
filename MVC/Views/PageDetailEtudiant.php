<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Alerte</title>
    <link rel="stylesheet" href="../Style/Style.css">
    <link rel="stylesheet" href="../Style/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
<style>

</style>
<div class="MainContainer">
    <?php if (!empty($etudiant) ) : ?>
    <div class="Subtitle">
        <h1><?= htmlspecialchars($etudiant->getPreNomUti()) ?> <?= htmlspecialchars($etudiant->getNomUti())?></h1>
    </div>

    <div class="DescriptionEtudiant">
        <h2>Information Etudiant :</h2>
        <?= htmlspecialchars($etudiant->getEtuAdr()) ?> <?= htmlspecialchars($etudiant->getEtuVille()) ?> <?= htmlspecialchars($etudiant->getEtuCp()) ?><br>
        <?= htmlspecialchars($etudiant->getEmailUti())?><br>
        <?= htmlspecialchars($etudiant->getMaClasse()->getNomCla())?><br>
    </div>
    <div class="InfosEntreprise">
        <h2>Information d'entreprise :</h2>
        <?= htmlspecialchars($etudiant->getMonEnt()->getNomEnt())?><br>
        <?= htmlspecialchars($etudiant->getMonEnt()->getAdrEnt())?> <?= htmlspecialchars($etudiant->getMonEnt()->getCpEnt())?> <?= htmlspecialchars($etudiant->getMonEnt()->getVilEnt())?><br>
        <?= htmlspecialchars($etudiant->getMonMaitreAp()->getPreMaiAppr())?> <?= htmlspecialchars($etudiant->getMonMaitreAp()->getNomMaiAppr())?><br>
        <?= htmlspecialchars($etudiant->getMonMaitreAp()->getTelMaiAppr())?><br>
        <?= htmlspecialchars($etudiant->getMonMaitreAp()->getMailMaiAppr())?><br>
    </div>
    <div class="InfoSujetMemoire">
        <h2>Sujet de memoire :</h2>
        <?php
        $bil = $etudiant->getMesBilan2();
        foreach ($bil as $bilan) {
            echo(htmlspecialchars($bilan->getSujBil()));
        }
        ?>
        <br>

    </div>
    <div class="boutonModifMDP">
        <button class="boutonModifBilan">Les Bilans</button>
    </div>
    <div class="Buttondown">
        <div class="boutonModifMDP">
            <button class="boutonBack">Retour</button>
        </div>
        <div class="boutonModifMDP">
            <button class="BoutonModifElem"><a href=""> Modifier les elements</a></button>
        </div>

    </div>


</div>

<?php endif; ?>
</body>
</html>
