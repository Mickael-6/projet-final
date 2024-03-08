<?php 
// Vérifie si la session n'est pas vide
if (!empty($_SESSION)) {  
    // Récupère l'ID de l'utilisateur à partir de la session
    $id = $_SESSION['id'];

    // Requête SQL pour sélectionner l'utilisateur en fonction de son ID
    $sql_select_user_by_id = "SELECT * FROM `user` WHERE `id` = '$id'";
    
    // Exécute la requête SQL
    $table_user_by_id =  $connexion->query($sql_select_user_by_id);

    // Récupère la première ligne de résultat sous forme de tableau associatif
    $resultat_user_by_id = $table_user_by_id->fetch(PDO::FETCH_ASSOC);
} 
?>

	