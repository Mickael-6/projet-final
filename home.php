<?php 
session_start();
require_once("lib/login_bdd.php");
require_once("lib/select_user_by_name.php");


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voice-Note</title>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
</head>
<body>

    <section class="content">
        <nav>
           
            <h1>Voice-Note</h1>
            <ul class ="liste">
                
                <li><a href="#note">Notes</a></li>
                <li><a href="#calendar">Calendrier</a></li>
               
        <?php if (empty($_SESSION)) { ?>
            <!-- Bouton de connexion s'il n'y a pas de session active -->
            <button class="connexion" onclick="window.location.href='user_login_page/user_login_page.php'">Connexion</button>
        <?php } else {  ?>
            <!-- Affichage du message de bienvenue et bouton de déconnexion si une session est active -->
            <p class="bienvenue">Bienvenue <?php echo $resultat_user_by_id['name']?><i class="fa-solid fa-user-check"></i></p>
            <button class="deconnexion" onclick="window.location.href='lib/logout.php'" ><i class="fa-solid fa-circle-minus"></i> Deconnexion</button>
        <?php }  ?>
                    
            </ul>
            
        </nav>
        <section class="main-container">
            <div class="left-content">
                <h2>Organisez-vous dès <br>Aujourd'hui ! </h2>
                <h3>Avec Voice Note, vous pouvez créer des notes et planifier vos propres rendez-vous. <br>la solution idéale pour une gestion simple et efficace de vos tâches quotidiennes. <br>Créez des notes en un clin d'œil, planifiez vos rendez-vous à l'avance, et restez toujours à jour, <br> peu importe votre emploi du temps.</h3>
        
                <div class="buttons-main">
                    <button id="see-more"><a href="#note">Voir Plus</a></button>
                    <button></button>
                </div>
            </div>
            <div class="right-content"></div>
        </section>

    </section>
        <footer>
            <div id="note">
                <div class="image-note">
                    <img src="./assets/main-html/note_footer.png" alt="Image d'une page  de bloc note">
                </div>
                <div class="note-content">
                    <h3>NOTE</h3>
                    <p>Plus besoin de clavier pour capturer vos idées ! Avec cette fonctionnalité, il vous suffit de parler et vos mots sont instantanément transformés en texte. Vous pouvez enregistrer vos notes à tout moment ou les télécharger. Que ce soit pour une idée brillante à ne pas oublier ou une réunion importante, tout est simple et rapide !</p>


                    <?php if (empty($_SESSION)) { ?>
           <a href="http://localhost/projet-final/user_login_page/user_login_page.php">Commencer à utiliser =></a>
        <?php } else {  ?>
            <a href="http://localhost/projet-final/index.php">Commencer à utiliser =></a>
        
        <?php }  ?>
                </div>
            </div>
            <div id="calendar">
                <div class="image-calendar">
                    <img src="./assets/main-html/calendar_footer.jpg" alt="Image d'une personne qui note un rendez vous sur un calendrier">
                </div>
                <div class="calendar-content">
                    <h3>CALENDRIER</h3>
                    <p>
                    Organiser votre emploi du temps n'a jamais été aussi amusant et facile ! Avec notre calendrier intégré, vous pouvez ajouter vos notes vocales à une date et une heure précises en un clin d'œil. Plus besoin de vous inquiéter d’oublier une réunion ou un rendez-vous important ! Il suffit de parler, et hop, votre note est automatiquement placée dans le calendrier.  
                    </p>
                   
                    <?php if (empty($_SESSION)) { ?>
           <a href="http://localhost/projet-final/user_login_page/user_login_page.php">Commencer à utiliser =></a>
        <?php } else {  ?>
            <a href="http://localhost/projet-final/calendar_page/calendar.php">Commencer à utiliser =></a>
        
        <?php }  ?>
                </div>
            </div>
        </footer>
        <script src="js/home.js"></script>
</body>
</html>
