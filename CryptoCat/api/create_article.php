<?php

require_once '../functions/connect.php';
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Обработка данных из формы
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $img = $_POST["img"];
        $title = $_POST["title"];
        $text = $_POST["text"];
        $sql = "INSERT INTO `articles` (`id`, `Img`, `Title`, `Text`) 
                VALUES (NULL, '".$img."', '".$title."', '".$text."')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        echo "Article created successfully";
        
        header('Location:/admin.php?page=articles');
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>