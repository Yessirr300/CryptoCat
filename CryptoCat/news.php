
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/bitcoin.png">
    <title>CryptoCat</title>
</head>
<body>
    <div class="header">
        <div class="header_menu">
            <a href="list.php">Coin List</a>
            <a href="articles.php">Articles</a>
            <a href="index.php" class="title">
                <p>Crypto</p>
                <p class="here">Cat</p>
            </a>
            <a href="news.php">News</a>
            <a href="aboutus.html">About Us</a>
        </div>
    </div>

    <div class="container">
        <div class="Recent_news">Recent news</div>
        <div class="news">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "CryptoCat";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Ошибка подключения к базе данных: " . $conn->connect_error);
            }

            $sql = "SELECT id, img, title, text, date FROM news ORDER BY id DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $bigNewsShown = false;
                echo '<div class="small_newscolumn">';
                while ($row = $result->fetch_assoc()) {
                    if ($row["id"] == 2 && !$bigNewsShown) {
                        echo '<div class="big_new">';
                        echo '<div class="big_new_img">';
                        echo '<img src="' . $row["img"] . '" alt="img">';
                        echo '</div>';
                        echo '<div class="big_new_title">' . $row["title"] . '</div>';
                        echo '<div class="big_new_text">' . $row["text"] . '</div>';
                        echo '<div class="big_new_date">' . $row["date"] . '</div>';
                        echo '</div>';

                        $bigNewsShown = true;
                    } else {
                         
                        if (!$bigNewsShown) {
                            echo '<div class="small_news">';
                        }

                        echo '<div class="new">';
                        echo '<div class="new_img">';
                        echo '<img src="' . $row["img"] . '" alt="img">';
                        echo '</div>';
                        echo '<div class="new_text_block">';
                        echo '<div class="new_title">' . $row["title"] . '</div>';
                        echo '<div class="new_text">' . $row["text"] . '</div>';
                        echo '<div class="snew_date">' . $row["date"] . '</div>';
                        echo '</div>';
                        echo '</div>';

                        if (!$bigNewsShown) {
                            echo '</div>';
                        }

                    }
                }
            } else {
                echo "Нет данных для вывода.";
            }
            $conn->close();
            ?>
        </div>
    </div>

    <div class="glu"></div>
    <div class="glu2"></div>
    <div class="glu3"></div>
    <div class="glu4"></div>
</body>
</html>