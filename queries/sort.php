<?php
        session_start();
        require "../db/dbconnect.php";
        $id = $_SESSION['id'];
        $pull = "SELECT * FROM notes WHERE notes.user = $id ORDER BY title ASC";
        $pull_notes =$conn->query($pull);
        while ($data = $pull_notes->fetch_assoc()) : ?>
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
