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


    <div class="MainContainerflex">
        <div class="ajout-container">
            <h1>Ajout d'une classe</h1>
            <form method="POST" action="?action=addClasse" class="ajout-etudiant-form">
                <div class="ajout-etudiant-form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                <div class="ajout-etudiant-buttons">
                    <button type="submit" class="ajout-etudiant-btn ajout-etudiant-btn-ajouter">Ajouter</button>
                    <button type="button" class="ajout-etudiant-btn ajout-etudiant-btn-annuler"
                            onclick="window.location.href='?action=GestionClasse'">Annuler
                    </button>
                </div>
        </div>

    </div>

</body>
</html>