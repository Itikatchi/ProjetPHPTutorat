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
</head>
<body>
<div class="MainContainerEtudiant">
    <div class="MainTitleEtudiant">
        <h1>Elève</h1>
    </div>

    <div class="DescriptionEtudiant">
        <h2>
            Informations détaillées
        </h2>

        <br>
        <?php if (!empty($etudiant) ) : ?>
        <p>
            Nom et prénom : <?= htmlspecialchars($etudiant->getNomUti())?> <?= htmlspecialchars($etudiant->getPreNomUti()) ?><br><br>
            Numéro de téléphone : <?= htmlspecialchars($etudiant->getEtuTel())?><br><br>
            Adresse : <?= htmlspecialchars($etudiant->getEtuAdr())?><br><br>
            Classe : <?= htmlspecialchars($etudiant->getMaClasse()->getNomCla())?><br><br>
            Mail : <?= htmlspecialchars($etudiant->getEmailUti())?><br>
        </p>

        <button class="boutonModifMDP">Modifier votre mot de passe</button>
    </div>

    <div class="InfosEntreprise">
        <h2>Informations entreprise</h2>
        <br>
        <p>
            Nom de l'entreprise : <?= htmlspecialchars($etudiant->getMonEnt()->getNomEnt())?><br><br>
            Adresse de l'entreprise : <?= htmlspecialchars($etudiant->getMonEnt()->getAdrEnt())?><br><br>
            Code postal de l'entreprise : <?= htmlspecialchars($etudiant->getMonEnt()->getCpEnt())?><br><br>
            Ville de l'entreprise : <?= htmlspecialchars($etudiant->getMonEnt()->getVilEnt())?><br><br>
        </p>
    </div>

</div>

<div class="rightPage">
    <div class="logo">
        <img src="../Image/FSI_logo.png" class="imgFSI" alt="logoFSI">
    </div>

    <div class="boutonModifEtudiant">
        <button class="boutonModifierInfos">Modifier vos informations</button>
    </div>
</div>
        <?php endif; ?>
</body>
</html>