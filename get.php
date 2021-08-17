<?php

// Refer: https://qiita.com/fantm21/items/603cbabf2e78cb08133e JSONの取得
// Refer: https://qiita.com/izanari/items/f4f96e11a2b01af72846 SSLエラーについて
// API: DB_Ope_API

$url = "https://localhost:44395/api/members";

$options['ssl']['verify_peer']=false;
$options['ssl']['verify_peer_name']=false;

//$json = file_get_contents($url);
$json = file_get_contents($url, false, stream_context_create($options));
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr = json_decode($json,true);

var_dump($arr);
