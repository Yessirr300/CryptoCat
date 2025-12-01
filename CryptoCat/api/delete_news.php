<?php
require_once '../functions/connect.php';
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Обработка данных из формы
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newsId = $_POST['id'];
        echo $newsId;
        $sql = "DELETE FROM `news`  WHERE `id` = '".$newsId."'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        echo "New deleted successfully";

        header('Location:/admin.php?page=news');
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
