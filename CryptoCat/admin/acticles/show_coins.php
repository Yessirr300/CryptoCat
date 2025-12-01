<form action="api/update_coins.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $coins['id']; ?>">
    <label for="img">Image:</label><br>
    <input type="text" name="img" id="img" value="<?php echo $coins['Img']; ?>">
    <br>
    <label for="title">Title:</label><br>
    <input type="text" name="title" id="title" value="<?php echo $coins['Title']; ?>">
    <br>

    <input type="submit" value="Update Coin">
  </form>