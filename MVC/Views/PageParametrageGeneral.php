<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramétrage</title>
    <link rel="stylesheet" href="../Style/Style.css">
</head>
<body>
<div class="MainContainer">
    <div class="parametrage-container">
        <h1 class="parametrage-title">PARAMETRAGE</h1>
        <div class="parametrage-grid">
            <a href="?action=GestionClasse" class="parametrage-button">Gestion Classe</a>
            <a href="?action=GestionSpe" class="parametrage-button">Gestion Spécialité</a>
            <a href="?action=GestionAlerte" class="parametrage-button">Gestion Date Alerte</a>
            <a href="#" class="parametrage-button"></a>
        </div>
    </div>
    <button type="button" class="ajout-etudiant-btn ajout-etudiant-btn-annuler"
            onclick="window.location.href='?action=parametrage'" style="width: 200px; align-self: center">Retour
    </button>
</div>
</body>
</html>
