<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
require_once("../lib/login_bdd.php");
require_once("../lib/display_user_note.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="../css/user_note.css">
</head>
<body>

    
    <header>
        <nav>
            <a href="http://localhost/projet-final/home.php" class="title">Voice-Note</a>
            <ul>
            
                <li><a href="../calendar_page/calendar.php">Calendrier</a></li>
            </ul>
            
        </nav>
    </header>
    
    <section id="main-container">
        <div class="flexbox-container">
            <?php 
            if($notes->rowCount() > 0){
                while($note = $notes->fetch()) { ?>
        
        <div class="<?php echo $note['type_note']?>"  id=<?php echo $note['note_id'] ?>>
        <!-- Trigger/Open The Modal -->
        <img src="../assets/user_note/pin_blue.png" alt="" height="50px" class="pin pin_important" id="blue_<?php echo $note['note_id'] ?>">
        <img src="../assets/user_note/pin_red.png" alt="" height="50px" class="pin pin_utile" id="red_<?php echo $note['note_id'] ?>">
        <img src="../assets/user_note/pin_yellow.png" alt="" height="50px" class="pin pin_aucun_type" id="yellow_<?php echo $note['note_id'] ?>">
        <button class="myBtn none" id="btn_<?php echo $note['note_id'] ?>"><img src="../assets/user_note/delete.jpg" alt="" height="50px"></button>
        <div class="myModalDelete" id="delete_<?php echo $note['note_id'] ?>" >
            
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <form action="../lib/delete_note.php" method="post">
                <input type="hidden" name="note_id" id="note_id" value="<?php echo $note['note_id'] ?>">
                <button type="submit" name="delete_note" >Supprimer la note</button>
            </form>
        </div>
        
    </div>
    <div class="margin">
        <p><?php echo $note['note']?></p>
        
        
        
        <!-- The Modal -->
        
        <button class="myBtn2 none" id="btn2_<?php echo $note['note_id'] ?>"><img src="../assets/modals/edit_icon.png" alt="" height="20px"></button>
        
        <!-- The Modal -->
        <div class="myModalEdit" id="edit_<?php echo $note['note_id'] ?>" >
            
        <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <form action="../lib/modify_note.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $note['id'] ?>">
                            <input type="text" name="newNote">
                            <button type="submit" name="modify_note">Modifier la note</button>
                        </form>
                    </div>
                    
                </div>
                
            </div>
        </div>
        
        <?php }  ?>
        <?php }  ?>
        <div class="addNote">
    <a href="../index.php">

        <button class="btn btn-circle" id="add_note_btn"> Add Note</button>
    </a>
    </div>
    </div>
</section>

<script src="../js/modification_note.js"></script>
<script src="../js/pin_note.js"></script>
</body>
</html>