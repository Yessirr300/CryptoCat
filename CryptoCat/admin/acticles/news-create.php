
<form action="api/create_news.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id">
    <label for="img">Image:</label><br>
    <input type="text" name="img" id="img">
    <br>
    <label for="title">Title:</label><br>
    <input type="text" name="title" id="title">
    <br>
    <label for="text">Text:</label><br>
    <textarea name="text" id="text" rows="10" cols="50"></textarea>
    <br>
    <label for="date">Date:</label><br>
    <input type="date" name="date" id="date">
    <br>

    <input type="submit" value="Update Article">
</form>
