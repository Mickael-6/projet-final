<?php 
// Inclusion du fichier de gestion de l'inscription utilisateur

require_once("../lib/user_signup.php");
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/sign_up.css">
    <!-- Lien vers la police de caractères Montserrat depuis Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Conteneur principal pour les formulaires -->
    <div class="main">
        <!-- Formulaire d'inscription -->
        <div id="a-container" class="container a-container">
            <form id="a-form" class="form" method="POST">
                <h2 class="form__title title">Create Account</h2>
                <!-- Icônes et champ de saisie pour le nom, l'email et le mot de passe -->
                <div class="form__icons">
                    <img class="form__icon" src="data:image/svg+xml;base64,PD94bWw... (truncated)" alt="">
                    <!-- Autres icônes -->
                </div>
                <span class="form__span">or use email for registration</span>
                <input class="form__input" type="text" placeholder="Name" name="name">
                <input class="form__input" type="text" placeholder="Email" name="email">
                <input class="form__input" type="password" placeholder="Password" name="mdp">
                <button class="form__button button submit">S'inscrire</button>
            </form>
        </div>

        <!-- Formulaire de connexion -->
        <div id="b-container" class="container b-container">
            <form id="b-form" class="form" method="" action="">
                <h2 class="form__title title">Se connecter au site</h2>
                <!-- Icônes et champ de saisie pour l'email et le mot de passe -->
                <div class="form__icons">
                    <img class="form__icon" src="data:image/svg+xml;base64,PD94bWw... (truncated)" alt="">
                    <!-- Autres icônes -->
                </div>
                <input class="form__input" type="text" placeholder="Email" name="email">
                <input class="form__input" type="password" placeholder="Password" name="mdp">
                <button class="form__button button submit">SIGN IN</button>
            </form>
        </div>
        <div class="switch" id="switch-cnt">
            <div class="switch__circle"></div>
            <div class="switch__circle switch__circle--t"></div>
            
            <div class="switch__container" id="switch-c1">
                <h2 class="switch__title title">Welcome Back !</h2>
                <p class="switch__description description">To keep connected with us please login with your personal info</p>
                <button class="switch__button button switch-btn"><a href="../user_login_page/user_login_page.php">se connecter</a></button>
            </div>
            
            <!-- <div class="switch__container" id="switch-c2">
                <h2 class="switch__title title">Hello Friend !</h2>
                <p class="switch__description description">Enter your personal details and start journey with us</p>
                <button class="switch__button button switch-btn-c2">SIGN UP</button>
            </div>
        </div> -->
    </div>

    
    <!-- Inclusion du script JavaScript -->
</body>
</html>
