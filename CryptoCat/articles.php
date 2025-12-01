
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/bitcoin.png">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
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
        <div class="Recent_news">Articles</div>
        <div class="search">
            <div class="search_block">
                <form method="GET">
                    <span class="search_icon"><i class="fa fa-search"></i></span>
                    <input class="search_inp" type="text" name="search" placeholder="Search here..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                </form>
            </div>
        </div>
    
        <?php
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'CryptoCat';
        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

        if ($conn->connect_error) {
            die("Ошибка подключения к базе данных: " . $conn->connect_error);
        }

        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $conn->real_escape_string($_GET['search']);
            $sql = "SELECT id, img, title, text FROM articles WHERE title LIKE '%$search%'";
        } else {
            $sql = "SELECT id, img, title, text FROM articles";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="articles">';
                echo '<div class="art">';
                echo '<div class="art_img">';
                echo '<img src="' . $row['img'] . '" alt="img">';
                echo '</div>';
                echo '<div class="art_text_block">';
                echo '<div class="art_title">' . $row['title'] . '</div>';
                echo '<div class="art_text">' . $row['text'] . '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo 'Нет статей, соответствующих вашему запросу.';
        }

        $conn->close();
        ?>
        </div>
        <div class="glu"></div>
        <div class="glu2"></div>
        <div class="glu3"></div>
        <div class="glu4"></div>

</body>
</html>
