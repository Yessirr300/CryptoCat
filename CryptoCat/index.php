
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/bitcoin.png">
    <title>CryptoCat</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function updatePrices() {
            $('#bitcoinPrice').text('Loading...');
            $('#bitcoinChange').text('');
            $('#ethereumPrice').text('Loading...');
            $('#ethereumChange').text('');
            $('#bnbPrice').text('Loading...');
            $('#bnbChange').text('');
            $('#usdtPrice').text('Loading...');
            $('#usdtChange').text('');

            $.ajax({
                url: 'get_prices.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#bitcoinPrice').html('$' + formatPrice(data.bitcoin.currentPrice));
                    $('#ethereumPrice').html('$' + formatPrice(data.ethereum.currentPrice));
                    $('#bnbPrice').html('$' + formatPrice(data.binancecoin.currentPrice));
                    $('#usdtPrice').html('$' + formatPrice(data.tether.currentPrice));
                    $('#bitcoinChange').html(getPercentageChange(data.bitcoin.currentPrice, data.bitcoin.prevPrice) + '%');
                    $('#ethereumChange').html(getPercentageChange(data.ethereum.currentPrice, data.ethereum.prevPrice) + '%');
                    $('#bnbChange').html(getPercentageChange(data.binancecoin.currentPrice, data.binancecoin.prevPrice) + '%');
                    $('#usdtChange').html(getPercentageChange(data.tether.currentPrice, data.tether.prevPrice) + '%');
                }
            });
        }
        function formatPrice(price) {
            return price.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        function getPercentageChange(currentPrice, prevPrice) {
            var percentageChange = ((currentPrice - prevPrice) / prevPrice) * 100;
            return percentageChange.toFixed(2);
        }
        $(document).ready(function() {
            updatePrices();
        });
        setInterval(updatePrices, 10000);
    </script>
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
    <div class="text_block">
        <p class="title1">Your Best Cryptocurrency Assistant</p>
        <p class="main_text">Read various articles, follow coin charts, communicate on different topics with the AI, and learn new information every day.</p>
        <div class="button">
            <a href="articles.php">Get Started</a>
        </div>
    </div>
    <div class="Popular">
        <p class="PC">Popular Coins</p>
        <div class="Coins">
            <div class="block">
                <div class="block_header">
                    <div class="icon"><img src="img/bitcoin-btc-logo.png" alt="BTC"></div>
                    <div class="name">BTC</div>
                    <div class="more_button">
                        <div class="more">
                            <i class="icono-arrow1-left-up"></i>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="block_body">
                    <div class="prise"><span id="bitcoinPrice"></span></div>
                    <!-- <div class="diferent"><b><span id="bitcoinChange"></span></b></div> -->
                    <div class="graphick"></div>
                </div>
            </div>
            <div class="block">
                <div class="block_header">
                    <div class="icon"><img src="img/ZJZZK5B2ZNF25LYQHMUTBTOMLU.png" alt="ETH"></div>
                    <div class="name">ETH</div>
                    <div class="more_button">
                        <div class="more">
                            <i class="icono-arrow1-left-up"></i>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="block_body">
                    <div class="prise"><span id="ethereumPrice"></span></div>
                    <!-- <div class="diferent"><b><span id="ethereumChange"></span></b></div> -->
                    <div class="graphick"></div>
                </div>
            </div>
            <div class="block">
                <div class="block_header">
                    <div class="icon"><img src="img/bitcoin-ic 2.png" alt="BNB"></div>
                    <div class="name">BNB</div>
                    <div class="more_button">
                        <div class="more">
                            <i class="icono-arrow1-left-up"></i>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="block_body">
                    <div class="prise"><span id="bnbPrice"></span></div>
                    <!-- <div class="diferent"><b><span id="bnbChange"></span></b></div> -->
                    <div class="graphick"></div>
                </div>
            </div>
            <div class="block">
                <div class="block_header">
                    <div class="icon"><img src="img/tether.png" alt="USDT"></div>
                    <div class="name">USDT</div>
                    <div class="more_button">
                        <div class="more">
                            <i class="icono-arrow1-left-up"></i>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="block_body">
                    <div class="prise"><span id="usdtPrice"></span></div>
                    <!-- <div class="diferent"><b><span id="usdtChange"></span></b></div> -->
                    <div class="graphick"></div>
                </div>
            </div>
            
        </div>
    
    <div class="glu"></div>
    <div class="glu2"></div>
    <div class="glu3"></div>
    <div class="glu4"></div>
</body>
</html>