<?php
require_once("login_bdd.php");

if (isset($_POST['modify_note'])) {

    $id = $_POST['id'];
    $newNote = $_POST['newNote'];

    echo $id;
    echo $newNote;

    try {
        $update = $connexion->prepare('UPDATE note SET note = :newNote WHERE  id = :id');
        $update->bindParam(':id', $id);
        $update->bindParam(':newNote', $newNote);
        $update->execute();
        var_dump($update->rowCount());

        if ($update->errorCode() !== '00000') {
            $errorInfo = $update->errorInfo();
            echo 'Erreur MySQL : ' . $errorInfo[2];
        } else {
            // Redirection ou autre traitement après la mise à jour réussie
            header("Location: ../note_page/user_note.php");
            exit();
        }
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
}