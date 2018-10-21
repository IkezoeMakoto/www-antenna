<?php
require_once(__DIR__."/vendor/autoload.php");

use \GuzzleHttp\Client;

// 記事取得
$uri = getenv('url');
$client = new Client([
    'base_uri' => $uri,
]);

$method = 'GET';
$uri = '/articles/search';
$options = [
    'query' => ['keyword' => 'www'],
    'headers' => [
        'Authorization' => getenv('auth')
    ]
];
$response = $client->request($method, $uri, $options);
$list = json_decode($response->getBody()->getContents(), true)['articles'];

// 設定
$title = 'くさあんてな';
$imageUrl = 'https://all-guide.com/wp-content/uploads/935520731.jpg';
$url = 'https://www-antenna.zoe.tools';
$desc = 'くさの生える記事を配信します。'
?>

<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
    <link rel="icon" type="image/x-icon" href="//favicon.ico">
    <meta charset="utf-8">
    <meta itemprop="name" content="<?php echo $title; ?>">
    <meta itemprop="image" content="<?php echo $imageUrl; ?>">

    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:type" content="graph">
    <meta property="og:url" content="<?php echo $url; ?>">
    <meta property="og:image" content="<?php echo $imageUrl; ?>">
    <meta property="og:description" content="<?php echo $desc; ?>">
    <meta property="og:site_name" content="<?php echo $title; ?>">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="<?php echo $imageUrl; ?>">
    <meta name="twitter:title" content="<?php echo $title; ?>">
    <meta name="twitter:description" content="<?php echo $desc; ?>">
    <meta name="twitter:app:name:iphone" content="<?php echo $title; ?>">

    <title><?php echo $title; ?></title>
</head>
<body>
<h1><?php echo $title; ?></h1>
<ul>
<?php foreach ($list as $antenna): ?>
    <li>
        <span><?php echo '【'.$antenna['publisherName'] .'】'.$antenna['publishedAt'];?></span>
        <a href="<?php echo $antenna['url']?>" target="_blank"><?php echo $antenna['title']; ?></a>
    </li>
<?php endforeach; ?>
</ul>
</body>
</html>