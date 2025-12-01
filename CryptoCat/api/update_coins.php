<?php

require_once '../functions/connect.php';
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Обработка данных из формы
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $coinsId = $_POST['id'];
        $img = $_POST["img"];
        $title = $_POST["title"];
        $sql = "UPDATE `coins` SET `Img` = '".$img."', `Title` = '".$title."'  WHERE `id` = '".$coinsId."'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        echo "Coin updated successfully";
        
        header('Location:/admin.php?page=coins');
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>