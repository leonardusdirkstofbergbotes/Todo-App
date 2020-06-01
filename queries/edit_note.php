<?php 
    $noteID = $_POST['noteID'];
    require "../db/dbconnect.php";

    $check_note = "SELECT * FROM notes WHERE notes.noteID = \"$noteID\"";
    $row = $conn->query($check_note);
    while ($data = $row->fetch_assoc()) : ?>
        <form class="update" id="edit_data"> 
            <div class="close">
                <button type="button" class="clickme" onclick="cancel()"><img src="./icons/cancel.png" title="Close" alt="close window"></button>
            </div>
            <input type="hidden" name="noteID" value="<?php echo $noteID ?>" id="ide">
            <label for="title">Title</label>
            <input type="text" name="title" pattern=".{2,255}" id="place" value="<?php echo $data['title']; ?>">
            <label for="description">Note details</label>
            <textarea name="description" rows="10" pattern=".{5,255}"><?php echo $data['description']; ?></textarea>  
            <div class="pick">
                <input type="date" name="date" min="<?php  echo date('Y-m-d'); ?>"> 
                <input type="color" name="color" value="<?php echo $data['color']; ?>">
                <div id="palette" onclick="color(this)"></div>    
            </div>
            <button type="submit" class="clickme" onclick="update_note()"><img src="./icons/update.png" title="Edit note" class="upd"></button>
        </form>
    <?php endwhile; ?>



