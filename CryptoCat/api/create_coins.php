<?php

require_once '../functions/connect.php';
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Обработка данных из формы
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $img = $_POST["img"];
        $title = $_POST["title"];
        $sql = "INSERT INTO `coins` (`id`, `Img`, `Title`) 
                VALUES (NULL, '".$img."', '".$title."')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        echo "Coin created successfully";
        
        header('Location:/admin.php?page=coins');
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>