<?php 
session_start();
  $id = $_SESSION['id'];
    require "../db/dbconnect.php";

    $check_notes = "SELECT * FROM notes WHERE notes.user = $id";
    $all_notes = $conn->query($check_notes);
    
    while ($data = $all_notes->fetch_assoc()) : ?>
      <li style="background-color:<?php echo $data['color']; ?>" id="<?php echo $data['noteID']; ?>">
         <h1><?php echo $data['title']; ?></h1>
         <hr><p><?php echo nl2br($data['description']); ?></p>
         <div class="buttonshide" id="<?php echo $data['noteID']; ?>">
           <button class="clickme edit" onclick="edit(this)" id="<?php echo $data['noteID']; ?>"><img src="./icons/edit.png" title="Edit note"></button>
           <button class="clickme delete" onclick="delete_note(this)" id="<?php echo $data['noteID']; ?>"><img src="./icons/close.png" title="DELETE note"></button>
         </div>
     </li>
  <?php endwhile; ?>

      