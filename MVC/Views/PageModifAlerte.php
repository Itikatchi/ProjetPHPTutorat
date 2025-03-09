<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modification Etudiant</title>
    <link rel="stylesheet" href="../Style/Style.css">
</head>
<body>
<div class="MainContainerflex">
    <div class="ajout-container">
        <div class="modifetudiant-title">
            <h1>Modification Des alerte</h1>
        </div>


            <form method="POST" action="?action=saveAlerte" class="ajout-etudiant-form">

                    <div class="ajout-etudiant-form-group">
                        <label for="dateEnt">Date limite visite en Entreprise :</label>
                        <input type="date" id="dateEnt" name="dateEnt"
                               value="<?= htmlspecialchars($alerte->getDateVisiteEnt()->format("Y-m-d")) ?>" placeholder="Date Visite Entreprise" required>
                    </div>
                    <div class="ajout-etudiant-form-group">
                        <label for="dateMem">Date limite rendu sujet de memoire :</label>
                        <input type="date" id="dateMem" name="dateMem" value="<?= htmlspecialchars($alerte->getDateSujMemoire()->format("Y-m-d")) ?>"
                               placeholder="Date Rendu sujet memoire" required>
                    </div>
                    <div class="ajout-etudiant-form-group">
                        <label for="DateBil2">Date limite Bilan 2 :</label>
                        <input type="date" id="DateBil2" name="DateBil2"
                               value="<?= htmlspecialchars($alerte->getDatLimBil2()->format("Y-m-d")) ?>" placeholder="Date Limite Bil2" required>
                    </div>
                    <div class="modifetudiant-buttons">
                        <button style="cursor: pointer;" class="ajout-etudiant-btn ajout-etudiant-btn-ajouter">Modifier</button>
                        <button type="button" class="ajout-etudiant-btn ajout-etudiant-btn-annuler"
                                onclick="window.location.href='?action=parametrageGenerale'">Annuler
                        </button>

                    </div>


    </div>

    </form>
</div>
</div>
</div>
</div>
</body>
</html>

