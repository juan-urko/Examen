<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $note = $_POST['note'];
    $notesFile = 'notes.txt';

            if (strlen($note) > 256) {
            echo "Please keep your note within 256 characters.";
        } else {
            $notes = file_get_contents($notesFile);
            $notesArray = explode("\n", $notes);
            $count = count($notesArray) + 1;
            $newNote = "Note $count: $note\n";
            file_put_contents($notesFile, $newNote, FILE_APPEND);
            echo $newNote;
        }
    }
?>