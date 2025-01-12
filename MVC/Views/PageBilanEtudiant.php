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
            <div class="PannelBilan">
                Bilan 1
                <?php if ($_SESSION['role'] == "administrateur"): ?>
                    <div class="PannelBilanAdd"><a
                                href="./AdministrateurController.php?action=CreationduBil1&id=<?= htmlspecialchars($etudiants->getIduti()) ?>">
                            +
                        </a>
                    </div>
                <?php elseif ($_SESSION['role'] == "tuteur") : ?>
                    <div class="PannelBilanAdd"><a
                                href="./TuteurController.php?action=CreationduBil1&id=<?= htmlspecialchars($etudiants->getIduti()) ?>">
                            +
                        </a>
                    </div>
                <?php endif; ?>
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


        </div>

        <table>
            <!-- PARTIE THREAD -->
            <thead>
            <tr>
                <th>Etudiant :</th>
                <th>Année Bilan :</th>
                <?php if ($_SESSION['role'] == "administrateur" || $_SESSION['role'] == "tuteur") : ?>
                    <th>Modifier le Bilan</th>
                <?php endif; ?>
                <th>Details du bilan :</th>
            </tr>
            </thead>
            <!-- PARTIE TBODY -->
            <tbody>
            <?php foreach ($bilan1 as $bilan) : ?>
                <?php if ($bilan->getDatVisEnt() == null) : ?>
                    <tr>
                        <?php if ($_SESSION['role'] == "administrateur") : ?>
                            <td colspan="2">Nouveau Bilan</td>
                            <td><a href="./AdministrateurController.php?action=modifierBilan1&id=<?php

                                if ($s = $bilan->getIdBil()) {
                                    echo(htmlspecialchars($s));
                                } else {
                                    echo("L'etudiant n'a pas encore de sujet !");
                                }

                                ?>">Ajouter des donnée au bilan</a></td>
                            <?php if (count($bilan1) > 1) : ?>
                            <td><a href="./AdministrateurController.php?action=delBilan1&id=<?php

                                if ($s = $bilan->getIdBil()) {
                                    echo(htmlspecialchars($s));
                                } else {
                                    echo("L'etudiant n'a pas encore de sujet !");
                                }

                                ?>">Supprimer le bilan !</a></td>
                            <?php else:?>
                            <td></td>
                            <?php endif; ?>
                        <?php elseif ($_SESSION['role'] == "tuteur") : ?>
                            <td colspan="2">Nouveau Bilan</td>
                            <td><a href="./TuteurController.php?action=modifierBilan1&id=<?php

                                if ($s = $bilan->getIdBil()) {
                                    echo(htmlspecialchars($s));
                                } else {
                                    echo("L'etudiant n'a pas encore de sujet !");
                                }
                                ?>">Ajouter des donnée au bilan </a></td>
                            <?php if (count($bilan1) > 1) : ?>
                            <td><a href="./TuteurController.php?action=delBilan1&id=<?php

                                if ($s = $bilan->getIdBil()) {
                                    echo(htmlspecialchars($s));
                                } else {
                                    echo("L'etudiant n'a pas encore de sujet !");
                                }

                                ?>">Supprimer le bilan !</a></td>
                            <?php else:?>
                            <td></td>
                            <?php endif; ?>
                        <?php else : ?>
                            <td colspan="4">Votre Bilan est Vide</td>
                        <?php endif; ?>
                    </tr>
                <?php else : ?>
                    <tr>
                        <td><?= htmlspecialchars($etudiants->getPrenomUti()) ?> <?= htmlspecialchars($etudiants->getNomUti()) ?></td>
                        <td><?php

                            if ($bilan->getDatVisEnt() != null) {
                                echo($bilan->getDatVisEnt()->format('Y'));
                            } else {
                                echo("L'etudiant n'a pas de premier bilan.");
                            }

                            ?>
                        </td>
                        <?php if ($_SESSION['role'] == "administrateur") : ?>
                            <td><a href="./AdministrateurController.php?action=modifierBilan1&id=<?php

                                if ($s = $bilan->getIdBil()) {
                                    echo(htmlspecialchars($s));
                                } else {
                                    echo("L'etudiant n'a pas encore de sujet !");
                                }

                                ?>">Modifier</a></td>
                        <?php elseif ($_SESSION['role'] == "tuteur") : ?>
                            <td><a href="./TuteurController.php?action=modifierBilan1&id=<?php

                                if ($s = $bilan->getIdBil()) {
                                    echo(htmlspecialchars($s));
                                } else {
                                    echo("L'etudiant n'a pas encore de sujet !");
                                }
                                ?>">Modifier</a></td>
                        <?php else: ?>
                        <?php endif; ?>

                        <?php if ($_SESSION['role'] == "administrateur") : ?>
                            <td><a href="./AdministrateurController.php?action=detailBilan1&id=<?php
                                if ($s = $bilan->getIdBil()) {
                                    echo(htmlspecialchars($s));
                                } else {
                                    echo("L'etudiant n'a pas encore de sujet !");
                                }
                                ?>">Details</a></td>
                        <?php elseif ($_SESSION['role'] == "etudiant") : ?>
                            <td><a href="./EtudiantController.php?action=detailBilan1&id=<?php

                                if ($s = $bilan->getIdBil()) {
                                    echo(htmlspecialchars($s));
                                } else {
                                    echo("L'etudiant n'a pas encore de sujet !");
                                }

                                ?>">Details</a></td>
                        <?php elseif ($_SESSION['role'] == "tuteur") : ?>
                            <td><a href="./TuteurController.php?action=detailBilan1&id=<?php

                                if ($s = $bilan->getIdBil()) {
                                    echo(htmlspecialchars($s));
                                } else {
                                    echo("L'etudiant n'a pas encore de sujet !");
                                }

                                ?>">Details</a></td>
                        <?php endif; ?>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
        <!-- ////////////////////////////////// BILAN 2 //////////////////////////////////-->
        <div class="PannelBilan">
            Bilan 2
            <?php if ($_SESSION['role'] == "administrateur") : ?>
                <div class="PannelBilanAdd"><a
                            href="./AdministrateurController.php?action=CreationduBil2&id=<?php echo($etudiants->getIduti()) ?>">
                        +
                    </a>
                </div>
            <?php elseif ($_SESSION['role'] == "tuteur") : ?>
                <div class="PannelBilanAdd"><a
                            href="./TuteurController.php?action=CreationduBil2&id=<?= htmlspecialchars($etudiants->getIduti()) ?>">
                        +
                    </a>
                </div>
            <?php endif; ?>
        </div>

        <table>
            <!-- PARTIE THREAD -->
            <thead>
            <tr>
                <th>Etudiant :</th>
                <th>Année Bilan :</th>
                <?php if ($_SESSION['role'] == "administrateur" || $_SESSION['role'] == "tuteur") : ?>
                    <th>Modifier le Bilan</th>
                <?php endif; ?>
                <th>Details du bilan :</th>
            </tr>
            </thead>
            <!-- PARTIE TBODY -->
            <tbody>
            <?php foreach ($bilan2 as $bilan) : ?>
            <?php if ($bilan->getDatBil2() == null) : ?>
                <tr>
                    <?php if ($_SESSION['role'] == "administrateur") : ?>
                        <td colspan="2">Nouveau Bilan</td>
                        <td><a href="./AdministrateurController.php?action=modifierBilan2&id=<?php

                            if ($s = $bilan->getIdBil()) {
                                echo(htmlspecialchars($s));
                            } else {
                                echo("L'etudiant n'a pas encore de sujet !");
                            }

                            ?>">Ajouter des donnée au bilan</a></td>
                        <?php if (count($bilan2) > 1) : ?>
                        <td><a href="./AdministrateurController.php?action=delBilan2&id=<?php

                            if ($s = $bilan->getIdBil()) {
                                echo(htmlspecialchars($s));
                            } else {
                                echo("L'etudiant n'a pas encore de sujet !");
                            }

                            ?>">Supprimer le bilan !</a></td>
                        <?php else:?>
                            <td></td>
                        <?php endif; ?>
                    <?php elseif ($_SESSION['role'] == "tuteur") : ?>
                        <td colspan="2">Nouveau Bilan</td>
                        <td><a href="./TuteurController.php?action=modifierBilan2&id=<?php

                            if ($s = $bilan->getIdBil()) {
                                echo(htmlspecialchars($s));
                            } else {
                                echo("L'etudiant n'a pas encore de sujet !");
                            }
                            ?>">Ajouter des donnée au bilan </a></td>
                        <?php if (count($bilan2) > 1) : ?>
                        <td><a href="./TuteurController.php?action=delBilan2&id=<?php

                            if ($s = $bilan->getIdBil()) {
                                echo(htmlspecialchars($s));
                            } else {
                                echo("L'etudiant n'a pas encore de sujet !");
                            }

                            ?>">Supprimer le bilan !</a></td>
                        <?php else:?>
                            <td></td>
                        <?php endif; ?>
                    <?php else : ?>
                        <td colspan="4">Votre Bilan est Vide</td>
                    <?php endif; ?>
                </tr>
            <?php else : ?>
                <tr>
                <td><?= htmlspecialchars($etudiants->getPrenomUti()) ?> <?= htmlspecialchars($etudiants->getNomUti()) ?></td>
                <td><?php

                    if ($bilan->getDatBil2() != null) {
                        echo($bilan->getDatBil2()->format('Y'));
                    } else {
                        echo("L'etudiant n'a pas de premier bilan.");
                    }

                    ?>
                </td>
                <?php if ($_SESSION['role'] == "administrateur") : ?>
                    <td><a href="./AdministrateurController.php?action=modifierBilan2&id=<?php

                        if ($s = $bilan->getIdBil()) {
                            echo(htmlspecialchars($s));
                        } else {
                            echo("L'etudiant n'a pas encore de sujet !");
                        }

                        ?>">Modifier</a></td>
                <?php elseif ($_SESSION['role'] == "tuteur") : ?>
                    <td><a href="./TuteurController.php?action=modifierBilan2&id=<?php

                        if ($s = $bilan->getIdBil()) {
                            echo(htmlspecialchars($s));
                        } else {
                            echo("L'etudiant n'a pas encore de sujet !");
                        }
                        ?>">Modifier</a></td>
                <?php else: ?>
                <?php endif; ?>

                <?php if ($_SESSION['role'] == "administrateur") : ?>
                    <td><a href="./AdministrateurController.php?action=detailBilan2&id=<?php
                        if ($s = $bilan->getIdBil()) {
                            echo(htmlspecialchars($s));
                        } else {
                            echo("L'etudiant n'a pas encore de sujet !");
                        }
                        ?>">Details</a></td>
                <?php elseif ($_SESSION['role'] == "etudiant") : ?>
                    <td><a href="./EtudiantController.php?action=detailBilan2&id=<?php

                        if ($s = $bilan->getIdBil()) {
                            echo(htmlspecialchars($s));
                        } else {
                            echo("L'etudiant n'a pas encore de sujet !");
                        }

                        ?>">Details</a></td>
                <?php elseif ($_SESSION['role'] == "tuteur") : ?>
                    <td><a href="./TuteurController.php?action=detailBilan2&id=<?php

                        if ($s = $bilan->getIdBil()) {
                            echo(htmlspecialchars($s));
                        } else {
                            echo("L'etudiant n'a pas encore de sujet !");
                        }

                        ?>">Details</a></td>
                <?php endif; ?>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>