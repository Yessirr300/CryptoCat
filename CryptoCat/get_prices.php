<?php
$url = 'https://api.coingecko.com/api/v3/simple/price?ids=bitcoin,ethereum,binancecoin,tether&vs_currencies=usd&include_24hr_change=true';

$response = file_get_contents($url);

$data = json_decode($response, true);

$prices = [
    'bitcoin' => [
        'currentPrice' => $data['bitcoin']['usd'],
        'prevPrice' => $data['bitcoin']['usd_24h_change']
    ],
    'ethereum' => [
        'currentPrice' => $data['ethereum']['usd'],
        'prevPrice' => $data['ethereum']['usd_24h_change']
    ],
    'binancecoin' => [
        'currentPrice' => $data['binancecoin']['usd'],
        'prevPrice' => $data['binancecoin']['usd_24h_change']
    ],
    'tether' => [
        'currentPrice' => $data['tether']['usd'],
        'prevPrice' => $data['tether']['usd_24h_change']
    ]
];

header('Content-Type: application/json');

echo json_encode($prices);
?>