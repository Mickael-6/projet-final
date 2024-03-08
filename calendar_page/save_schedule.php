<?php
session_start();
require_once("../lib/login_bdd.php");

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // Display an error message and redirect if no data to save
    echo "<script> alert('Error: No data to save.'); location.replace('./') </script>";
    $connexion->close();
    exit;
}

extract($_POST);
$allday = isset($allday);

if (empty($id)) {
    // Prepared statement for INSERT
    $sql = "INSERT INTO `schedule` (`title`, `description`, `start_datetime`, `end_datetime`) VALUES (:title, :description, :start_datetime, :end_datetime)";
    $stmt = $connexion->prepare($sql);
    // Binding values and executing the query
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':start_datetime', $start_datetime);
    $stmt->bindParam(':end_datetime', $end_datetime);
    $save = $stmt->execute();

    // Check if insertion succeeded
    if ($save) {
        // Get the ID of the last inserted schedule
        $id = $connexion->lastInsertId();

        // Save the event in the user_schedule table
        $user_id = $_SESSION['id'];
        $schedule_id = $id;
        $sql_user_schedule = "INSERT INTO `user_schedule` (`user_id`, `schedule_id`) VALUES (:user_id, :schedule_id)";
        $stmt_user_schedule = $connexion->prepare($sql_user_schedule);
        $stmt_user_schedule->bindParam(':user_id', $user_id);
        $stmt_user_schedule->bindParam(':schedule_id', $schedule_id);
        $save_user_schedule = $stmt_user_schedule->execute();

        if ($save_user_schedule) {
            echo "<script> alert('Event Successfully Saved.'); location.replace('http://localhost/projet-final/calendar_page/calendar.php') </script>";
        } else {
            echo "An Error occurred while saving user schedule.";
        }
    } else {
        echo "Insertion failed.";
    }
} else {
    // Prepared statement for UPDATE
    $sql = "UPDATE `schedule` SET `title` = :title, `description` = :description, `start_datetime` = :start_datetime, `end_datetime` = :end_datetime WHERE `id` = :id";
    $stmt = $connexion->prepare($sql);
    // Binding values and executing the query
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':start_datetime', $start_datetime);
    $stmt->bindParam(':end_datetime', $end_datetime);
    $stmt->bindParam(':id', $id);

    $save = $stmt->execute();

    if ($save) {
        echo "<script> alert('Event Successfully Updated.'); location.replace('http://localhost/projet-final/calendar_page/calendar.php') </script>";
    } else {
        echo "An Error occurred while updating schedule.";
    }
}

$connexion->close();
?>

