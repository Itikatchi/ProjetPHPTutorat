<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>Connexion</title>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&amp;display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="./MVC/Style/Style.css">
</head>
<body class="login-page">
<div class="login-container">

    <div class="login-left">
        <img src="./MVC/Image/FSI_logo.png" alt="Logo FSI">
        <h1>GESTION DU TUTORAT</h1>
    </div>


    <div class="login-right">
        <h2>Bienvenue !</h2>
        <p>Login your account !</p>
        <form method="POST" action="./MVC/Controller/LoginController.php" class="login-form">
            <?php if (isset($_GET['error'])): ?>
                <p class="error-message"> <?php echo htmlspecialchars($_GET['error']); ?> </p>
            <?php endif; ?>
            <label for="email">Login</label>
            <input type="email" id="email" name="email" placeholder="Votre email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>

            <button type="submit" class="login-button">Login !</button>
        </form>
    </div>
</div>
</body>
</html>
