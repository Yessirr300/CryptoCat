<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminPanel.css">
    <title>Admin</title>
</head>
<body>
    <div class="content">
        <aside>
            <nav>
                <ul>
                    <li><a href="admin.php">Home</a></li>
                    <li><a href="admin.php?page=articles">Articles</a></li>
                    <li><a href="admin.php?page=news">News</a></li>
                    <li><a href="admin.php?page=coins">Coins</a></li>
                </ul>
            </nav>
        </aside>
        <main>
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] . '.php' : 'page1.php';
            $id = isset($_GET['id']) ? $_GET['id'] : '';

            // Определение текущей страницы
            $pagesFolder = 'admin/acticles/';

            // Вывод содержимого текущей страницы
            $pagePath = $pagesFolder . $page ;
            if (file_exists($pagePath)) {
            include $pagePath;
            } else {
            echo '<h1>Page not found </h1>'.$pagePath;
            }
            ?>
        </main>
    </div>
</body>
</html>