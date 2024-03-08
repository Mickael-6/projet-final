<?php 
// Démarrage de la session pour gérer les sessions utilisateur
session_start();

// Inclusion du fichier PHP qui gère le processus de connexion utilisateur
require_once("../lib/user_login.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire d'Inscription</title>
    <link rel="stylesheet" href="../css/sign_up.css">
</head>
<body>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="main.css">
    <!-- Lien vers la police de caractères Montserrat depuis Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Conteneur principal pour les formulaires -->
    <div class="main">
        <!-- Formulaire de connexion -->
        <div id="b-container" class="container b-container">
            <form id="b-form" class="form" method="POST">
                <h2 class="form__title title">Se connecter au site</h2>
                <!-- Icônes et champ de saisie pour l'email et le mot de passe -->
                <div class="form__icons">
                    <img class="form__icon" src="data:image/svg+xml;base64,PD94bWw... (truncated)" alt="">
                    <!-- Autres icônes -->
                </div>
                <input class="form__input" type="text" placeholder="Email" name="email">
                <input class="form__input" type="password" placeholder="Password" name="mdp">
                <button type="submit" class="form__button button submit">Se connecter</button>
            </form>
        </div>
        <div class="switch" id="switch-cnt">
            <div class="switch__circle"></div>
            <div class="switch__circle switch__circle--t"></div>
                        
            <div class="switch__container" id="switch-c2">
                <h2 class="switch__title title">Bienvenue !</h2>
                <p class="switch__description description">Enter your personal details and start journey with us</p>
                <button class="switch__button button switch-btn"><a href="../sign_up/sign_up.php">S'inscrire</a></button>
            </div>
        </div>
    </div>
</body>
</html>


