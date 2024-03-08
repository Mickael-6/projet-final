<?php 
require_once("../lib/login_bdd.php");
require_once("../lib/user_signup.php");



if (!empty($_POST)) {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    if (!empty($email) && !empty($mdp)) {
        // Sélectionner l'utilisateur par e-mail
        $sql_select_user = "SELECT * FROM `user` WHERE `email` = '$email'";
        $table_select_user = $connexion->query($sql_select_user);
        $resultat_user = $table_select_user->fetchAll(PDO::FETCH_ASSOC);

        if ($table_select_user->rowCount() > 0) {
            // Récupérer le mot de passe haché de la base de données
            $mdphash = $resultat_user[0]['mdp'];

            // Vérifier le mot de passe avec password_verify
            if (password_verify($mdp, $mdphash)) {
                // Mot de passe correct, utilisateur authentifié
                echo "GG ! On a une correspondance !";

                // Définir les variables de session
                $_SESSION['id'] = $resultat_user[0]['id'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['mdp'] = $mdp;  // Stocker le mot de passe haché dans la session n'est généralement pas recommandé.
                $_SESSION['name'] = $resultat_user[0]['name'];

                // Rediriger vers la page d'accueil
                // header("Location: ../index.php");
                header("location:../calendar_page/calendar.php");
                exit();
            } else {
                // Mot de passe incorrect
                echo "Mot de passe incorrect";
            }
        } else {
            // Aucun utilisateur trouvé avec cet e-mail
            echo "Aucun utilisateur trouvé avec cet e-mail";
        }
    }
}
?>
