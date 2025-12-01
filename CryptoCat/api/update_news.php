<?php
require_once '../functions/connect.php';
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Обработка данных из формы
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newsId = $_POST['id'];
        $img = $_POST["img"];
        $title = $_POST["title"];
        $text = $_POST["text"];
        $date = $_POST["date"];
        $sql = "UPDATE `news` SET `Img` = '".$img."', `Title` = '".$title."', `Date` = '".$date."', `Text` = '".$text."'  WHERE `id` = '".$newsId."'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        echo "New updated successfully";

        header('Location:/admin.php?page=news');
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>