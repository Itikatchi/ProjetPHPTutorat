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
            <?php if (!empty($etudiants) || !empty($bilan1)) : ?>
                <div class="PannelBilan">
                    Bilan 1
                </div>
                <?php if ($_SESSION['role'] == "administrateur") : ?>
                    <button class="boutonBack"><a
                                href="./AdministrateurController.php?action=detail&id=<?= htmlspecialchars($etudiants->getIduti()) ?>"">Retour</a>
                    </button>
                <?php endif; ?>
                <?php if ($_SESSION['role'] == "tuteur") : ?>
                    <button class="boutonBack"><a
                                href="./TuteurController.php?action=detail&id=<?= htmlspecialchars($etudiants->getIduti()) ?>"">Retour</a>
                    </button>
                <?php endif; ?>

            <?php endif; ?>
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
            <?php if ($bil1truefalse && !empty($etudiants) && !empty($bilan2)) : ?>
                <tr>
                    <td><?= htmlspecialchars($etudiants->getPrenomUti()) ?> <?= htmlspecialchars($etudiants->getNomUti()) ?></td>
                    <td><?php
                        foreach ($bilan1 as $bilan) {
                            if ($bilan->getDatVisEnt() != null) {
                                echo($bilan->getDatVisEnt()->format('Y'));
                            } else {
                                echo("L'etudiant n'a pas de premier bilan.");
                            }
                        }
                        ?></td>
                    <?php if ($_SESSION['role'] == "administrateur") : ?>
                        <td><a href="./AdministrateurController.php?action=detailBilan1&id=<?php
                            $bil = $etudiants->getMesBilan1();
                            foreach ($bil as $bilan) {
                                if ($s = $bilan->getIdBil()) {
                                    echo(htmlspecialchars($s));
                                } else {
                                    echo("L'etudiant n'a pas encore de sujet !");
                                }
                            }
                            ?>">Details</a></td>
                    <?php elseif ($_SESSION['role'] == "etudiant") : ?>
                        <td><a href="./EtudiantController.php?action=detailBilan1&id=<?php
                            $bil = $etudiants->getMesBilan1();
                            foreach ($bil as $bilan) {
                                if ($s = $bilan->getIdBil()) {
                                    echo(htmlspecialchars($s));
                                } else {
                                    echo("L'etudiant n'a pas encore de sujet !");
                                }
                            }
                            ?>">Details</a></td>
                    <?php elseif ($_SESSION['role'] == "tuteur") : ?>
                        <td><a href="./TuteurController.php?action=detailBilan1&id=<?php
                            $bil = $etudiants->getMesBilan1();
                            foreach ($bil as $bilan) {
                                if ($s = $bilan->getIdBil()) {
                                    echo(htmlspecialchars($s));
                                } else {
                                    echo("L'etudiant n'a pas encore de sujet !");
                                }
                            }
                            ?>">Details</a></td>
                    <?php endif; ?>
                </tr>

            <?php else : ?>
                <tr>
                    <td colspan="3">Aucune Bilan trouvé.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
        <div class="PannelBilan">
            Bilan 2
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
            <?php if ($bil2truefalse && !empty($etudiants) && !empty($bilan2)) : ?>
                <tr>
                    <td><?= htmlspecialchars($etudiants->getPrenomUti()) ?> <?= htmlspecialchars($etudiants->getNomUti()) ?></td>
                    <td><?php
                        foreach ($bilan2 as $bilan) {
                            if ($bilan->getDatBil2() != null) {
                                echo($bilan->getDatBil2()->format('Y'));
                            } else {
                                echo("L'etudiant n'a pas de second bilan.");
                            }
                        }
                        ?>
                    </td>
                    <?php if ($_SESSION['role'] == "administrateur") : ?>
                        <td><a href="./AdministrateurController.php?action=detailBilan2&id=<?php
                            $bil = $etudiants->getMesBilan1();
                            foreach ($bil as $bilan) {
                                if ($s = $bilan->getIdBil()) {
                                    echo(htmlspecialchars($s));
                                } else {
                                    echo("L'etudiant n'a pas encore de sujet !");
                                }
                            }
                            ?>">Details</a></td>
                    <?php elseif ($_SESSION['role'] == "etudiant") : ?>
                        <td><a href="./EtudiantController.php?action=detailBilan2&id=<?php
                            $bil = $etudiants->getMesBilan1();
                            foreach ($bil as $bilan) {
                                if ($s = $bilan->getIdBil()) {
                                    echo(htmlspecialchars($s));
                                } else {
                                    echo("L'etudiant n'a pas encore de sujet !");
                                }
                            }
                            ?>">Details</a></td>
                    <?php elseif ($_SESSION['role'] == "tuteur") : ?>
                        <td><a href="./TuteurController.php?action=detailBilan2&id=<?php
                            $bil = $etudiants->getMesBilan1();
                            foreach ($bil as $bilan) {
                                if ($s = $bilan->getIdBil()) {
                                    echo(htmlspecialchars($s));
                                } else {
                                    echo("L'etudiant n'a pas encore de sujet !");
                                }
                            }
                            ?>">Details</a></td>
                    <?php endif; ?>
                </tr>

            <?php else : ?>
                <tr>
                    <td colspan="3">Aucune Bilan trouvé.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>

    </div>

</div>
</body>
</html>