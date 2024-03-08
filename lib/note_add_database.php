<?php

// Inclusion du fichier de connexion à la base de données
require_once("login_bdd.php");

// Vérifie si des données ont été soumises via le formulaire
if (!empty($_POST)) {
    try {
        // Récupère la valeur de la note depuis le formulaire
        $note = $_POST['note'];

        // Supposant que vous avez une session utilisateur, récupère l'ID de l'utilisateur
        $userid = $_SESSION['id'];

        $typeNote = $_POST['type_note'];

        // Vérifie si la note n'est pas vide
        if (!empty($note)) {

            // Insertion de la note dans la table 'note'
            $sql_insert_note = "INSERT INTO `note` (`note`, `type_note`) VALUES (:note, :type_note)";
            $note_database = $connexion->prepare($sql_insert_note);
            $note_database->bindParam(':note', $note);
            $note_database->bindParam(':type_note', $typeNote);
            $note_database->execute();

            // Vérifie si l'insertion a réussi
            if ($note_database) {

                // Récupère l'ID de la dernière note insérée
                $noteid = $connexion->lastInsertId();

                // Insertion de l'association entre l'utilisateur et la note dans la table 'user_note'
                $sql_insert_usernote = "INSERT INTO `user_note` (`note_id`, `user_id`) VALUES (:note_id, :user_id)";
                $note_database = $connexion->prepare($sql_insert_usernote);
                $note_database->bindParam(':note_id', $noteid);
                $note_database->bindParam(':user_id', $userid);
                $note_database->execute();

                // Vérifie si l'insertion a réussi
                if ($note_database) {
                    header("Location: ./index.php");
                    exit();
                } else {
                    // Gestion de l'échec de l'insertion dans 'user_note'
                    throw new Exception("Erreur lors de l'insertion dans 'user_note'");
                }
            } else {
                // Gestion de l'échec de l'insertion dans 'note'
                throw new Exception("Erreur lors de l'insertion dans 'note'");
            }
        } else {
            // Gestion de la note vide
            throw new Exception("La note ne peut pas être vide");
        }
    } catch (Exception $e) {
        // Gestion des erreurs
        echo "Erreur : " . $e->getMessage();
    } finally {
        // Fermeture de la connexion à la base de données
        $connexion = null;
    }
}

// Il serait bénéfique de gérer les erreurs, de fermer la connexion à la base de données et de fournir un retour d'information à l'utilisateur.
?>
