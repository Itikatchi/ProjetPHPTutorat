<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Étudiant</title>
    <link rel="stylesheet" href="../Style/Style.css">
</head>
<body>
<div class="MainContainerflex">
    <div class="ajout-container">
        <h1>Creation du Bilan</h1>
        <form method="POST" action="?action=CreatBilan1&id=<?php echo($bilan1->getIdBil());?>" class="ajout-etudiant-form">
            <div class="ajout-etudiant-form-group">
                <label for="dateVisEnt">Date de Visite en Entreprise :</label>
                <input type="date" id="dateVisEnt" name="dateVisEnt" value="<?php
                if($bilan1->getDatVisEnt())
                {echo($bilan1->getDatVisEnt()->format("Y-m-d"));
                } ?>" required>
            </div>
            <div class="ajout-etudiant-form-group">
                <label for="noteEnt">Note d'entreprise :</label>
                <input type="number" min="0" max="20" step="0.0001" id="noteEnt" name="noteEnt" value="<?php echo($bilan1->getNotEnt()) ?>" >
            </div>
            <div class="ajout-etudiant-form-group">
                <label for="noteDos">Note de Dossier :</label>
                <input type="number"  min="0" max="20"  step="0.0001" id="noteDos" name="noteDos" value="<?php echo($bilan1->getNotDosBil()) ?>" >
            </div>
            <div class="ajout-etudiant-form-group">
                <label for="noteOra">Note de l'Oral :</label>
                <input type="number" min="0" max="20" step="0.0001" id="noteOra" name="noteOra" value="<?php echo($bilan1->getNotOraBil()) ?>" >
            </div>
            <div class="ajout-etudiant-form-group">
                <label for="remarque">Remarque :</label>
                <textarea style="resize: none; height: 50px"  id="remarque" name="remarque" ><?php echo($bilan1->getRemBil()) ?></textarea>
            </div>


            <div class="ajout-etudiant-buttons">
                <button type="submit" class="ajout-etudiant-btn ajout-etudiant-btn-ajouter">Ajouter</button>
                <button type="button" class="ajout-etudiant-btn ajout-etudiant-btn-annuler"
                        onclick="window.location.href='?action=bilanetud&id=<?php echo($bilan1->getMonEtu()->getIdUti())?>'">Annuler
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
