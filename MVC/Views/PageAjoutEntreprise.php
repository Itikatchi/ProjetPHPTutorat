<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Informations Tuteur</title>
    <link rel="stylesheet" href="../Style/Style.css">
    <link rel="stylesheet" href="../Style/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Contenu principal -->
    <div class="MainContainerEnt">
        <h1>Ajout d'une entreprise</h1>
        <form>
            <!-- Section entreprise -->
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom">

            <label for="adresse">Adresse :</label>
            <input type="text" id="adresse" name="adresse">

            <label for="cp">CP :</label>
            <input type="text" id="cp" name="cp">

            <label for="ville">Ville :</label>
            <input type="text" id="ville" name="ville">

            <!-- Section maître d'apprentissage -->
            <h2>Maître d'apprentissage</h2>
            <label for="nom_maitre">Nom :</label>
            <input type="text" id="nom_maitre" name="nom_maitre">

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom">

            <label for="email">Email :</label>
            <input type="email" id="email" name="email">

            <label for="tel">Tel :</label>
            <input type="tel" id="tel" name="tel">

            <!-- Boutons -->
            <div class="buttons">
                <a href="?action=ajoutEnt"><button type="submit" class="btn btn-ajouter">Ajouter</button></a>
                <a href="?action=param"><button type="reset" class="btn btn-annuler">Annuler</button></a>
            </div>
        </form>
    </div>
</div>
</body>
</html>

