<?php 
// Inclusion du fichier de connexion à la base de données
require_once("login_bdd.php"); 

// Récupération de l'identifiant de session de l'utilisateur
$id = $_SESSION['id'];
// Requête SQL pour sélectionner les notes de l'utilisateur actuel
$notes = $connexion->query("SELECT note.id, note.type_note, note.note, user_note.note_id FROM note INNER JOIN user_note ON note.id = user_note.note_id WHERE user_note.user_id = $id;");

?>