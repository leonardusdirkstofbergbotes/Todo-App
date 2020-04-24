<?php 
    session_start();
    $userID = $_SESSION['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $color = $_POST['color'];
    $id = $_SESSION['id'];

    require "../db/dbconnect.php";

    $create_note = "INSERT INTO notes (user, title, description, dueDate, color) 
                VALUES (\"$userID\", \"$title\", \"$description\", \"$date\", \"$color\");";
    $conn->query($create_note);
    $check_notes = "SELECT * FROM notes WHERE user = $id ORDER BY noteID DESC LIMIT 1";
    $all_notes = $conn->query($check_notes);
    
    while ($data = $all_notes->fetch_assoc()) : ?>
    <?php $start_date = new DateTime($data['dueDate']);
    $end_date = new DateTime('today');
        $diff = $end_date->diff($start_date)->format("%a"); ?>
        <li style="background-color:<?php echo $data['color']; ?>" id="<?php echo $data['noteID']; ?>">
        <?php if ($diff > 0 && $data != NULL) { echo "<div class=\"due\">Days left <b>$diff</b></div>"; } else {}; ?>
           <h1><?php echo $data['title']; ?></h1>
           <hr><p><?php echo nl2br($data['description']); ?></p>
           <div class="buttonshide" id="<?php echo $data['noteID']; ?>">
             <button class="clickme edit" onclick="edit(this)" id="<?php echo $data['noteID']; ?>"><img src="./icons/edit.png" title="Edit note"></button>
             <button class="clickme delete" onclick="delete_note(this)" id="<?php echo $data['noteID']; ?>"><img src="./icons/close.png" title="DELETE note"></button>
           </div>
       </li>
    <?php endwhile; ?>
