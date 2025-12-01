
<h1>Update News</h1>
  <?php
    require_once 'functions/connect.php';
    $res = [];
    try {
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // Получение данных статьи из базы данных
      $newsId = $_GET['id']; // Предполагается, что параметр id передается в URL

      $sql = "SELECT * FROM news WHERE id=:id";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':id', $newsId);
      $stmt->execute();
      $news = $stmt->fetch(PDO::FETCH_ASSOC);
      array_push($res, $news);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
  ?>

  <form action="api/update_news.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $news['id']; ?>">
    <label for="img">Image:</label><br>
    <input type="text" name="img" id="img" value="<?php echo $news['Img']; ?>">
    <br>
    <label for="title">Title:</label><br>
    <input type="text" name="title" id="title" value="<?php echo $news['Title']; ?>">
    <br>
    <label for="text">Text:</label><br>
    <textarea name="text" id="text" rows="10" cols="50"><?php echo $news['Text']; ?></textarea>
    <br>
      <label for="title">Date:</label><br>
      <input type="date" name="date" id="date" value="<?php echo $news['Date']; ?>">
      <br>

    <input type="submit" value="Update News">
  </form>