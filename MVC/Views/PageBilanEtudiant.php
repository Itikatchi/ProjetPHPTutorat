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
        <div class="PannelBilan">
        </div>
        <table>
            <thead>
            <tr>
                <th>Etudiant :</th>
                <th>Année Bilan :</th>
                <th>Details du bilan :</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($alerte) || !empty($alerteDATE)) : ?>
                <?php foreach ($alerte as $etudiant) : ?>
                    <tr>
                        <td><?= htmlspecialchars($etudiant->getPrenomUti())?> <?= htmlspecialchars($etudiant->getNomUti())?></td>
                        <td><?= $alerteDATE->getDatLimBil2()->format('Y')?></td>
                        <td><a href="./AdministrateurController.php?action=detailBilan&id=<?php
                            $bil = $etudiant->getMesBilan1();
                            foreach ($bil as $bilan) {
                                if ($s = $bilan->getIdBil()){
                                    echo(htmlspecialchars($s));
                                }else{
                                    echo("L'etudiant n'a pas encore de sujet !");
                                }
                            }
                            ?>">Details</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4">Aucune alerte trouvé.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
        <div class="PannelBilan">
        </div>
        <table>
            <thead>
            <tr>
                <th>Etudiant :</th>
                <th>Année Bilan :</th>
                <th>Details du bilan :</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($alerte) || !empty($alerteDATE)) : ?>
                <?php foreach ($alerte as $etudiant) : ?>
                    <tr>
                        <td><?= htmlspecialchars($etudiant->getPrenomUti())?> <?= htmlspecialchars($etudiant->getNomUti())?></td>
                        <td><?= $alerteDATE->getDatLimBil2()->format('Y')?></td>
                        <td><a href="./AdministrateurController.php?action=detailBilan&id=<?php
                            $bil = $etudiant->getMesBilan2();
                            foreach ($bil as $bilan) {
                                if ($s = $bilan->getIdBil()){
                                    echo(htmlspecialchars($s));
                                }else{
                                    echo("L'etudiant n'a pas encore de sujet !");
                                }
                            }
                            ?>">Details</a></td>
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