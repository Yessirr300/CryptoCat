<!-- <html lang="en">
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
    <div class="container-list">
    <div class="Recent_news">Articles</div>
    <div class="search">
            <div class="search_block">
                <form method="GET">  
                    <input class="search_inp" type="text" name="search" placeholder="Search here..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                </form>
            </div>
        </div>
        <div class="coin_block">
            <div class="top_coin">
                <div class="coin_img">
                    <img src="img/bitcoin-btc-logo.png" alt="img">     
                </div>
                <div class="coin_name">Bitcoin</div>
                <a href=""></a>
                <div class="coin_price">$29 899,89</div
                <p></p>
                <div class="button">
                <a class="coin_more_button" href="#">More</a>
                </div>
            </div>
            <div class="coin">
                <div class="coin_img">
                    <img src="img/bitcoin-btc-logo.png" alt="img">     
                </div>
                <div class="coin_name">Bitcoin</div>
                <a href=""></a>
                <div class="coin_price">$29 899,89</div
                <p></p>
                <div class="button">
                <a class="coin_more_button" href="#">More</a>
                </div>
            </div>
        </div>
    </div>

    
    <div class="glu"></div>
    <div class="glu2"></div>
    <div class="glu3"></div>
    <div class="glu4"></div>
</body>
</html> -->

<?php
// Assuming you have a connection to the database.
// Replace these variables with your actual database connection details.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CryptoCat";

// Establish a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL query to retrieve the required data from the database
$sql = "SELECT id, img, title FROM coins";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ru">
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
    <div class="container-list">
        <div class="Recent_news">Articles</div>
        <div class="search">
            <div class="search_block">
                <form method="GET">  
                    <input class="search_inp" type="text" name="search" placeholder="Поиск..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                </form>
            </div>
        </div>
        <div class="coin_block">
            <div class="top_coin">
                <?php
                // Assuming you have a top coin defined separately
                // Replace the static content with actual data from the database
                $top_coin_img = "img/bitcoin-btc-logo.png";
                $top_coin_title = "Bitcoin";
                $top_coin_price = "$29 899,89";

                // Connect to CoinGecko API to get current price of the top coin
                $coin_title_url = strtolower(str_replace(' ', '-', $top_coin_title));
                $api_url = 'https://api.coingecko.com/api/v3/coins/' . $coin_title_url;
                $json_data = file_get_contents($api_url);
                $data = json_decode($json_data, true);

                // Check if API response is successful and get the current price
                if ($data) {
                    $top_coin_price = '$' . number_format($data['market_data']['current_price']['usd'], 2, '.', ',');
                }
                ?>

                <div class="coin_img">
                    <img src="<?php echo $top_coin_img; ?>" alt="img">     
                </div>
                <div class="coin_name"><?php echo $top_coin_title; ?></div>
                <a href=""></a>
                <div class="coin_price"><?php echo $top_coin_price; ?></div>
                <p></p>
                <div class="button">
                    <a class="coin_more_button" href="#">More</a>
                </div>
            </div>

            <?php
            // Check if there are any records in the database and generate coin blocks
            if ($result->num_rows > 0) {
                // Loop through each record and generate the HTML for each coin block
                while ($row = $result->fetch_assoc()) {
                    $coin_img = $row["img"];
                    $coin_title = $row["title"];

                    // Connect to CoinGecko API to get current price of the coin
                    $coin_title_url = strtolower(str_replace(' ', '-', $coin_title));
                    $api_url = 'https://api.coingecko.com/api/v3/coins/' . $coin_title_url;
                    $json_data = file_get_contents($api_url);
                    $data = json_decode($json_data, true);

                    // Check if API response is successful and get the current price
                    $coin_price = "$29 899,89";
                    if ($data) {
                        $coin_price = '$' . number_format($data['market_data']['current_price']['usd'], 2, '.', ',');
                    }

                    // Output the HTML for the coin block
                    echo '<div class="coin">
                            <div class="coin_img">
                                <img src="' . $coin_img . '" alt="img">     
                            </div>
                            <div class="coin_name">' . $coin_title . '</div>
                            <a href=""></a>
                            <div class="coin_price">' . $coin_price . '</div>
                            <div class="button">
                                <a class="coin_more_button" href="#">More</a>
                            </div>
                        </div>';
                }
            } else {
                // If no records are found in the database, you can output a message here.
                echo "No coins found in the database.";
            }
            ?>

        </div>
    </div>

    <div class="glu"></div>
    <div class="glu2"></div>
    <div class="glu3"></div>
    <div class="glu4"></div>
    
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>