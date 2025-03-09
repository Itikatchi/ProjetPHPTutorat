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
        <div class="PannelBilan">
            Les Classes :
        </div>
        <table>
            <thead>
            <tr>
                <th>Specialité :</th>
                <th>Nombre d'étudiants :</th>
                <th>Supprimer la classe :</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($Specialite as $spe) : ?>
                <?php
                $idSpe = $spe->getIdSpec();
                $nombreEtudiants = $EtudiantDAO->countBySpe($idSpe); // Compte le nombre d'étudiants
                ?>

                <tr>
                    <td><?php echo htmlspecialchars($spe->getNomSpec()); ?></td>
                    <td><?php echo $nombreEtudiants; ?></td>
                    <td>
                        <?php if ($nombreEtudiants == 0) : ?>
                            <a href="./ParametreController.php?action=delspe&id=<?php echo htmlspecialchars($idSpe); ?>">
                                Supprimer la classe
                            </a>
                        <?php else : ?>
                            <span>Impossible de supprimer (classe non vide)</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>

    </div>
    <div class="Buttondown" style="position: fixed">
        <div class="boutonModifMDP">
            <button class="BoutonModifElem"><a
                    href="./ParametreController.php?action=AjouterSpe">
                    Ajouter une nouvelle Spécialité</a></button>
        </div>
        <div class="boutonModifMDP">
            <button class="boutonBack"><a href="./ParametreController.php?action=parametrageGenerale">Retour</a>
            </button>
        </div>

    </div>

</div>
</body>
</html>