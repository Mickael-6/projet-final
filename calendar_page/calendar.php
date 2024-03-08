<?php 

session_start();

require_once("../lib/login_bdd.php");
require_once("../lib/user_signup.php");

// var_dump($_SESSION);
// print_r($_SESSION);


// Check if flash message is set
if (isset($_SESSION['flash_message'])) {
    $flash_message = $_SESSION['flash_message'];
    $flash_style = $_SESSION['flash_style'];

    // Output the alert with appropriate style
    echo "<div class='alert alert-$flash_style' role='alert'>$flash_message</div>";

    // Clear the flash message variables
    unset($_SESSION['flash_message']);
    unset($_SESSION['flash_style']);
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheduling</title>
     <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>

</head>


<body class="bg-light">
<div class="container">

<header class="d-flex flex-wrap justify-content-center p-4 mb-4 border-bottom bg-danger" id="header">
        <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none" href="">
                    Calendar <img src="" width="65px" />
                </a>
   
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="../index.php">Notes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="../note_page/user_note.php">Mes Notes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="">Calendar</a>
                        </li>
                        <li class="nav-item">
                     <?php
                        // Check if the user is logged in
                       if (isset($_SESSION['id'])) {
                            // User is logged in: Fetch user details from the database
                            $user_id = $_SESSION['id'];
                           

                            // Display "Logout" and user's name
                            echo '<a class="nav-link text-white" href="../lib/logout.php"><img src="./assets/photo-de-profil.png" width="30px" /> Bienvenue ' . $_SESSION['name'] . '<i class="fa-solid fa-user-check"></i> Logout</a>';
                        }
                        else {
                            // User is not logged in: display "Login"
                            echo '<a class="nav-link text-white" href="../user_login_page/user_login_page.php"><img src="./assets/photo-de-profil.png" width="30px" /> Login</a>';
                        }
                        ?>


                        </li>
                    </ul>
             
</header>


   
   <!-- connection de user -->

    <div class="container py-5 mt-7" id="page-container">
        <div class="row">
            <div class="col-md-11">
                <div id="calendar"></div>
            </div>  
               <div class="col-md-1">
            <button id="add_event_btn" class="btn btn-circle">+</button>
        </div>  
            
        </div>
    </div> 
             <div class="modal fade" id="event_entry_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalLabel">Add New Event</h5>
				<button type="button" class="closeModal" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">X</span>
				</button>
			</div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <form action="save_schedule.php" method="post" id="schedule-form">
                                <input type="hidden" name="id" value="">
                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">Title</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" required>
                                </div>
                                <div class="form-group mb-2">
                                   <button class="btn record btn-danger">
                                    <div class="d-flex align-items-center">
                                        <ion-icon name="mic-outline" class="mr-2" style="font-size: 2rem;"></ion-icon>
                                        <img src="./assets/bars.svg" alt="" class="mr-2" style="width: 30px; height: 30px;"/>
                                        <p class="m-0">Start Listening</p>
                                    </div>
                                </button>
                                </div>
                               <div class="form-group mb-2">
                                <textarea class="result" rows="3" spellcheck="false" placeholder="Text will be shown here" name="description"></textarea>
                            </div>

                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-label">Start</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="end_datetime" class="control-label">End</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="end_datetime" id="end_datetime" required>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button class="btn btn-danger btn-sm rounded-0" type="submit" form="schedule-form" id="submit"><i class="fa fa-save"></i> Save</button>
                            <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Event Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Title</dt>
                            <dd id="title" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">Description</dt>
                            <dd id="description" class=""></dd>
                            <dt class="text-muted">Start</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">End</dt>
                            <dd id="end" class=""></dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Delete</button>
                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->
</div>
 
<?php 
if(isset($_SESSION["id"])){
$id = $_SESSION['id'];
$schedules = $connexion->query("SELECT schedule.id, schedule.title, schedule.description, schedule.start_datetime, schedule.end_datetime FROM schedule INNER JOIN user_schedule ON schedule.id = user_schedule.schedule_id WHERE user_schedule.user_id = $id");
if (!$schedules) {
    die("Erreur lors de l'exécution de la requête : " . mysqli_error($connection));
}
$sched_res = [];

while ($row = $schedules->fetch(PDO::FETCH_ASSOC)) {
    $row['sdate'] = date("F d, Y h:i A", strtotime($row['start_datetime']));
    $row['edate'] = date("F d, Y h:i A", strtotime($row['end_datetime']));
    $sched_res[$row['id']] = $row;
}

}


?>

</body>
<script>
     var scheds = <?= json_encode($sched_res) ?>;
</script>

<script src="./js/script.js"></script>
   <!-- IONICONS -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</html>

