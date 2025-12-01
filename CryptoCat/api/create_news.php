<?php
require_once '../functions/connect.php';
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $img = $_POST["img"];
        $title = $_POST["title"];
        $text = $_POST["text"];
        $date = $_POST["date"];
        $sql = "INSERT INTO `news` (`id`, `Img`, `Title`, `Text`, `Date`) 
                VALUES (NULL, '".$img."', '".$title."', '".$text." ', ' ".$date."')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        echo "News created successfully";

        header('Location:/admin.php?page=news');
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
