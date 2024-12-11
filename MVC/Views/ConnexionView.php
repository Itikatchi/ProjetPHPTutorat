<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./MVC/Style/Style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background-color: #7aa97d;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            display: flex;
            width: 900px;
            height: 500px;
            background-color: #ffffff;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .login-left {
            width: 50%;
            background-color: white;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px;
            border-top-left-radius: 25px;
            border-bottom-left-radius: 25px;
        }

        .login-left img {
            width: 140px;
            height: auto;
            margin-bottom: 20px;
        }

        .login-left h1 {
            font-size: 32px;
            font-weight: 700;
            margin: 0;
        }

        .login-right {
            width: 50%;
            background-color:  #7aa97d;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            text-align: center;
            border-top-right-radius: 25px;
            border-bottom-right-radius: 25px;
        }

        .login-right h2 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .login-right p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .login-form {
            width: 100%;
            max-width: 300px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .login-form label {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            text-align: left;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f5f5f5;
        }

        .login-button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            font-weight: 700;
            color: #ffffff;
            background-color: #7aa97d;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .login-button:hover {
            background-color: #5a845d;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="login-container">
    <!-- Partie gauche -->
    <div class="login-left">
        <img src="./MVC/Image/FSI_logo.png" alt="Logo FSI">
        <h1>GESTION DU TUTORAT</h1>
    </div>

    <!-- Partie droite -->
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
