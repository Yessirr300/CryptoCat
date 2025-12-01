<?php
require_once 'functions/connect.php';

$res = [];
try {
    // Установка режима отображения ошибок
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL запрос для получения данных
    $sql = "SELECT * FROM coins";

    // Подготовка и выполнение запроса
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Обработка результатов запроса
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Проверка наличия данных
    if (count($result) > 0) {
        // Ваш код для использования полученных данных
        foreach ($result as $row) {

            $id = $row["id"];
            $img = $row["Img"];
            $title = $row["Title"];

            array_push($res, $row);
        }
    } else {
        echo "No data found.";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
<h1>Coins</h1>
<a href="admin.php?page=coins-create">CREATE</a>
<br>
<table>
    <thead>
    <tr>
        <th>id</th>
        <th>img</th>
        <th>title</th>
        <th></th>
    </tr>
    </thead>
    <img src="" alt="">
    <tbody>
    <?php
    foreach ($res as $row) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td><img src=". $row["Img"] . " alt='img link'></td>";
        echo "<td>" . $row["Title"] . "</td>";
        echo "<td>
                    <a href='admin.php?page=show_coins&id=" . $row['id'] . "'>SHOW</a>
                </td>";
        echo "<td>
                    <form action='api/delete_coins.php' method='post'>
                        <input type='hidden' name='id' value='" . $row['id'] . "'>
                        <input type='submit' value='DELETE'>
                    </form>
                  </td>";
        echo "</tr>";

    }
    ?>
    </tbody>
</table>