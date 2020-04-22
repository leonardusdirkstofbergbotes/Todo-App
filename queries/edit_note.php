<?php 
    $noteID = $_POST['noteID'];
    require "../database/dbconnect.php";

    $check_note = "SELECT * FROM notes WHERE notes.noteID = \"$noteID\"";
    $row = $conn->query($check_note);
    while ($data = $row->fetch_assoc()) : ?>
        <form class="update" id="edit_data"> 
            <input type="hidden" name="noteID" value="<?php echo $data['noteID'] ?>">
            <label for="title">Title</label>
            <input type="text" name="title" pattern=".{2,40}" id="place" value="<?php echo $data['title']; ?>">
            <label for="description">Note details</label>
            <textarea name="description" rows="10" pattern=".{5,1000}"><?php echo $data['description']; ?></textarea>  
            <div class="pick">
                <input type="date" name="date" min = "<?php  echo date('Y-m-d'); ?>">
                <input type="color" name="color" value="<?php echo $data['color']; ?>">    
            </div>
            <button class="clickme" onclick="update_note()"><img src="./icons/update.png" title="Add note" class="upd"></button>
        </form>
    <?php endwhile; ?>



