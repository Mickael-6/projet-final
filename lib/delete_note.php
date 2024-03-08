<?php
require_once("login_bdd.php");

// Vérifier si le formulaire de suppression a été soumis
if (isset($_POST['delete_note'])) {
    // Récupérer l'ID de la note à supprimer depuis le formulaire
    $note_id = $_POST['note_id'];


    try {
        // Supprimer les enregistrements dans la table 'user_note' liés à cette note
        $stmt = $connexion->prepare('DELETE FROM user_note WHERE note_id = :note_id');
        $stmt->bindParam(':note_id', $note_id);
        $stmt->execute();
        // Supprimer l'enregistrement dans la table 'note'
        $stmt = $connexion->prepare('DELETE FROM note WHERE id = :note_id');
        $stmt->bindParam(':note_id', $note_id);
        $stmt->execute();


        // Redirection ou autre traitement après la suppression réussie
        header("Location: ../note_page/user_note.php");
        exit();
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
}
?>





