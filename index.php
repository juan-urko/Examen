<!-- index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOTES</title>
</head>
<body>
    <h1>NOTES</h1>
    <form id="notesForm" action="notes.php" method="POST">
        <label for="note">Write your notes here:</label><br>
        <textarea id="note" name="note" rows="6" cols="50" placeholder="Write your notes here (maximum 256 characters)" maxlength="256"></textarea><br>
        <button type="submit">Submit</button>
    </form>
    <div id="notesContainer">
       
    </div>

    <?php
    $notesFile = 'notes.txt';
    if (file_exists($notesFile)) {
        $notes = file_get_contents($notesFile);
        $notesArray = explode("\n", $notes);
        foreach ($notesArray as $note) {
            if (!empty($note)) {
                echo "<p>$note</p>";
            }
        }
    }
    ?>
</body>
</html>
