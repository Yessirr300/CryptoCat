<?php
require_once '../functions/connect.php';
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Обработка данных из формы
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $coinsId = $_POST['id'];
        echo $coinsId;
        $sql = "DELETE FROM `coins`  WHERE `id` = '".$coinsId."'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        echo "Coin deleted successfully";
        
        header('Location:/admin.php?page=coins');
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>