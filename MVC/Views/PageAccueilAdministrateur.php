<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Accueil Administrateur</title>
    <link rel="stylesheet" href="../Style/Style.css">
    <link rel="stylesheet" href="../Style/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
<div class="MainContainer">
    <div class="MainTitle">
        <h1>PARTIE ADMINISTRATEUR</h1>
        <h2>Bienvenue : <?= htmlspecialchars($prenom) . " " . htmlspecialchars($nom); ?></h2>
    </div>
    <div class="Description">
        <p>
            Cette partie est réserver à l'administration afin de pouvoir Administrer l'application de tutorat
        </p>
        <img src="../Image/FSI_logo.png" alt="Logo">
    </div>
</div>
</body>
</html>
