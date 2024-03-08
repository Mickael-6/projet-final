<?php
// Démarre une session de connexion
session_start();
// SI session_start n'est pas activé, alors nous ne pourrons pas manipuler la session

// détruit toutes les variables de sessions.
session_unset();
// Détruit toutes les données enregistrées dans une session
session_destroy();
// Redirige sur la page Index.php 
header('Location: ../home.php');