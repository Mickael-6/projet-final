<?php
session_start();
require_once("../lib/login_bdd.php");

// Check if event ID is provided
if (!isset($_GET['id'])) {
    // Set flash message and style for undefined event ID
    $_SESSION['flash_message'] = "Undefined Event ID.";
    $_SESSION['flash_style'] = "danger"; 
    // Redirect to the calendar page
    header("Location: http://localhost/projet-final/calendar_page/calendar.php");
    exit;
}

$id = $_GET['id'];

// Delete references in the user_schedule table
$delete_user_schedule = $connexion->prepare("DELETE FROM `user_schedule` WHERE `schedule_id` = :id");
$delete_user_schedule->bindParam(':id', $id);
$success_user_schedule = $delete_user_schedule->execute();

if (!$success_user_schedule) {
    // Set flash message and style for failure to delete user references
    $_SESSION['flash_message'] = "Failed to delete user references for the event.";
    $_SESSION['flash_style'] = "danger"; 
    // Redirect to the calendar page
    header("Location: http://localhost/projet-final/calendar_page/calendar.php");
    exit;
}

// Delete entry from the schedule table
$delete_schedule = $connexion->prepare("DELETE FROM `schedule` WHERE `id` = :id");
$delete_schedule->bindParam(':id', $id);
$success_schedule = $delete_schedule->execute();

if ($success_schedule) {
    // Set flash message and style for successful deletion
    $_SESSION['flash_message'] = "Event has been deleted successfully.";
    $_SESSION['flash_style'] = "success"; 
} else {
    // Set flash message and style for failure to delete the event
    $_SESSION['flash_message'] = "An error occurred while deleting the event.";
    $_SESSION['flash_style'] = "danger"; 
}

// Redirect to the calendar page
header("Location: http://localhost/projet-final/calendar_page/calendar.php");
exit;
?>
