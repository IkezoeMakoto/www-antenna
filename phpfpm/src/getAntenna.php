<?php
require_once(__DIR__."/vendor/autoload.php");

$key = 'articles';

$redisClient = new \Predis\Client([
    'scheme' => 'tcp',
    'host'   => 'redis',
    'port'   => 6379,
]);
$list = $redisClient->get($key);

if (!empty($list)) {
    return true;
}

// 記事取得
$uri = getenv('url');
$httpClient = new \GuzzleHttp\Client([
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
$response = $httpClient->request($method, $uri, $options);
$list = json_decode($response->getBody()->getContents(), true)['articles'];

$expireSec = 60 * 60;
$result = $redisClient->setex($key, $expireSec, json_encode($list));

return $result;