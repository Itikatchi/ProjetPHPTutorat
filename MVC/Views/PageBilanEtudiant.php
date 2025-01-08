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
            <?php if (!empty($etudiants)|| !empty($bilan1)) : ?>

                    <tr>
                        <td><?= htmlspecialchars($etudiants->getPrenomUti())?> <?= htmlspecialchars($etudiants->getNomUti())?></td>
                        <td><?php
                            foreach ($bilan1 as $bilan) {
                                if ($bilan->getDatVisEnt() != null) {
                                    echo($bilan->getDatVisEnt()->format('Y'));
                                }else{
                                    echo("L'etudiant n'a pas de premier bilan.");
                                }
                            }
                            ?></td>
                        <td><a href="./AdministrateurController.php?action=detailBilan&id=<?php
                            $bil = $etudiants->getMesBilan1();
                            foreach ($bil as $bilan) {
                                if ($s = $bilan->getIdBil()){
                                    echo(htmlspecialchars($s));
                                }else{
                                    echo("L'etudiant n'a pas encore de sujet !");
                                }
                            }
                            ?>">Details</a></td>
                    </tr>

            <?php else : ?>
                <tr>
                    <td colspan="4">Aucune Bilan trouvé.</td>
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
            <?php if (!empty($etudiants) || !empty($bilan2)) : ?>

                    <tr>
                        <td><?= htmlspecialchars($etudiants->getPrenomUti())?> <?= htmlspecialchars($etudiants->getNomUti())?></td>
                        <td><?php
                            foreach ($bilan2 as $bilan) {
                                if ($bilan->getDatBil2() != null) {
                                    echo($bilan->getDatBil2()->format('Y'));
                                } else {
                                    echo("L'etudiant n'a pas de second bilan.");
                                }
                            }
                            ?></td>
                        <td><a href="./AdministrateurController.php?action=detailBilan&id=<?php
                            $bil = $etudiants->getMesBilan2();
                            foreach ($bil as $bilan) {
                                if ($s = $bilan->getIdBil()){
                                    echo(htmlspecialchars($s));
                                }else{
                                    echo("L'etudiant n'a pas encore de sujet !");
                                }
                            }
                            ?>">Details</a></td>
                    </tr>

            <?php else : ?>
                <tr>
                    <td colspan="4">Aucune Bilan trouvé.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>