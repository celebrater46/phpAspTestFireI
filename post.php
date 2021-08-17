<?php

// https://qiita.com/okdyy75/items/d21eb95f01b28f945cc6 PHP POST送信について
// https://qiita.com/yousan/items/dc2cc789dcb0f07a61dc PHPの外部への接続でSSLのエラーが出てしまう@KUSANAGI PHP7.2
// API: DB_Ope_API

ini_set('display_errors', "On");
echo "Hello World" . PHP_EOL;

// Test
$target_url = "https://localhost:44395/api/members";
$options['ssl']['verify_peer']=false;
$options['ssl']['verify_peer_name']=false;
//file_get_contents($target_url, false, stream_context_create($options));
$json = file_get_contents($target_url, false, stream_context_create($options));
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr = json_decode($json,true);
var_dump($arr);

$url = 'https://localhost:44395/api/members';

$data = array(
    'id' => 4,
    'Name' => 'Aizawa',
    'Age' => 58,
    'HireDate' => '2021/08/18',
);

$context = array(
//    'http' => array(
    'ssl' => array(
        'method'  => 'POST',
        'header'  => implode("\r\n", array('Content-Type: application/x-www-form-urlencoded',)),
        'content' => http_build_query($data),
        'verify_peer' => false,
        'verify_peer_name' => false,
    )
);

$html = file_get_contents($url, false, stream_context_create($context));

var_dump($http_response_header);
echo $html;



