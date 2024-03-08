<?php 
// Démarrage de la session pour gérer les sessions utilisateur
session_start();
// Inclusion des fichiers PHP nécessaires pour la connexion à la base de données et la récupération d'utilisateur par nom
require_once("lib/login_bdd.php");
require_once("lib/select_user_by_name.php");
require_once("lib/note_add_database.php");
// echo var_dump($_SESSION)
?>
<?php if(!empty($_SESSION)) { ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Balises meta pour la configuration de la page -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Inclusion d'une feuille de style CSS -->
    <link rel="stylesheet" href="style.css" />

    <!-- Titre de la page -->
    <title>Speech to Text</title>
</head>

<body>

    <header>
        <nav>
            <a href="http://localhost/projet-final/home.php" class="title">Voice-Note</a>
            <ul>
                <li><a href="http://localhost/projet-final/note_page/user_note.php">Mes notes</a></li>
               
                <li><a href="http://localhost/projet-final/calendar_page/calendar.php">Calendrier</a></li>
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
    </header>

    <section class="main-container">

       
    <img class="imgred" src="./assets/main-html/undraw_exciting_news_re_y1iw.svg" alt="">
        <!-- Conteneur principal de la page -->
        <div class="container">
            <!-- En-tête de la page -->
            <p class="heading">Speech to Text</p>
        

            <!-- Options pour la langue -->
            <div class="options">
                <div class="anguage">
                    <p>Language</p>
                    <select name="input-language" id="language"></select>
                </div>
            </div>


            <!-- Ligne de séparation -->
            <div class="line"></div>

            <!-- Bouton pour enregistrer la voix -->
            <button class="btn record">
                <div class="icon">
                    <ion-icon name="mic-outline"></ion-icon>
                    <img src="bars.svg" alt="" />
                </div>
                <p>Start Listening</p>
            </button>

            <!-- Affichage du résultat -->
            <p class="heading">Result :</p>
            
            <form method="POST">
        
            <textarea class="result" name="note" spellcheck="false"></textarea>
            
            <div class="options">
                <div class="anguage">
                    <p>Type de note</p>
                    <select name="type_note" id="typeofnote">
                        <option  value="important">Important</option>
                        <option  value="utile">Utile</option>
                        <option  value="aucun_type"  selected="selected">Aucun Type</option>

                    </select>
                </div>
            </div>
            
            <button class="login100-form-btn">
                add database
            </button>
            </form>
        
            <!-- Boutons supplémentaires -->
            <div class="buttons">
                <button class="btn clear">
                    <ion-icon name="trash-outline"></ion-icon>
                    <p>Clear</p>
                </button>
                <button class="btn download">
                    <ion-icon name="cloud-download-outline"></ion-icon>
                    <p>Download</p>
                </button>
            </div>
        </div>

    <img class="imgnote"  src="./assets/main-html/undraw_ideas_flow_re_bmea.svg" alt="">

    </section>


    <!-- Icônes Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Fichier JavaScript pour les langues -->
   
    <script src="languages.js"></script>
    <script src="script1.js"></script>
    

</body>

</html>

<?php } else {  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Petit malin connecte toi</h1>
</body>
</html>



 <?php }  ?>