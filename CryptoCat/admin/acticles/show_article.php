<h1>Update Article</h1>
  <?php
    require_once 'functions/connect.php';
    $res = [];
    try {
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // Получение данных статьи из базы данных
      $articleId = $_GET['id']; // Предполагается, что параметр id передается в URL
      
      $sql = "SELECT * FROM articles WHERE id=:id";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':id', $articleId);
      $stmt->execute();
      $article = $stmt->fetch(PDO::FETCH_ASSOC);
      array_push($res, $article);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
  ?>

  <form action="api/update_article.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
    <label for="img">Image:</label><br>
    <input type="text" name="img" id="img" value="<?php echo $article['Img']; ?>">
    <br>
    <label for="title">Title:</label><br>
    <input type="text" name="title" id="title" value="<?php echo $article['Title']; ?>">
    <br>
    <label for="text">Text:</label><br>
    <textarea name="text" id="text" rows="10" cols="50"><?php echo $article['Text']; ?></textarea>
    <br>

    <input type="submit" value="Update Article">
  </form>