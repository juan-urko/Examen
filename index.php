<!-- index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOTES</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h1>NOTES</h1>
    <form id="notesForm">
        <label for="note">Write your notes here:</label><br>
        <textarea id="note" name="note" rows="6" cols="50" placeholder="Write your notes here (maximum 256 characters)" maxlength="256"></textarea><br>
        <button type="submit">Submit</button>
    </form>
    <div id="notesContainer">
        <!-- This empty div will be populated with notes after submission -->
    </div>

    <script>
        $(document).ready(function(){
            $('#notesForm').submit(function(event){
                event.preventDefault();
                var note = $('#note').val();
                if (note.length > 256) {
                    alert('Please keep your note within 256 characters.');
                    return;
                }
                $.ajax({
                    type: 'POST',
                    url: 'notes_ajax.php',
                    data: { note: note },
                    success: function(response){
                        $('#notesContainer').append('<p>' + response + '</p>');
                        $('#note').val(''); // Clear the textarea after submission
                    }
                });
            });
        });
    </script>
</body>
</html>
