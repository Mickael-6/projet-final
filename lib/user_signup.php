<?php 
// Inclusion du fichier de connexion à la base de données
require_once("login_bdd.php");

// Décommenter la ligne suivante pour afficher le contenu de $_POST (utile pour le débogage)
// print_r($_POST);

// Vérifie si le formulaire a été soumis (s'il y a des données dans $_POST)
if (!empty($_POST)) {

    // Récupère les valeurs du formulaire
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $mdphash = password_hash($mdp, PASSWORD_DEFAULT); // Hashage du mot de passe
    $name = $_POST['name'];

    // Vérifie si les champs requis ne sont pas vides
    if (!empty($email) && !empty($mdp) && !empty($name)) {

        // Vérifie si la longueur du mot de passe est supérieure ou égale à 8 caractères
        if (strlen($mdp) >= 8) {

            // Vérifie la validité de l'adresse email
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                // Vérifie si l'adresse email n'est pas déjà utilisée
                $sql_select_user = "SELECT `email` FROM `user` WHERE `email` = '$email'";
                $table_select_user = $connexion->query($sql_select_user);

                if ($table_select_user->rowCount() == 0) {

                    // Aucune correspondance, l'adresse email est disponible

                    // Insertion de l'utilisateur dans la base de données
                    $sql_insert_user = "INSERT INTO `user` (`email`, `mdp`, `name`) VALUES ('$email', '$mdphash', '$name');";
                    $connexion->query($sql_insert_user);

                    // Redirection vers la page d'accueil
                    header('Location: ../user_login_page/user_login_page.php');

                } else {
                    // L'adresse email est déjà utilisée
                    // echo "email déjà existant";
                }

            } else {
                // L'adresse email est invalide
                // echo "L'adresse email est invalide";
            }

        } else {
            // Le mot de passe est inférieur à 8 caractères
            echo "Votre mot de passe est inférieur à 8 caractères";
        }

    } else {
        // Certains champs requis sont vides
        echo "Erreur ! Veuillez remplir tous les champs.";
    }
}
?>
