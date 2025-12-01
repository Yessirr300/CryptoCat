<?php
require_once '../functions/connect.php';
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Обработка данных из формы
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $articleId = $_POST['id'];
        echo $articleId;
        $sql = "DELETE FROM `articles`  WHERE `id` = '".$articleId."'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        echo "Article deleted successfully";
        
        header('Location:/admin.php?page=articles');
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>