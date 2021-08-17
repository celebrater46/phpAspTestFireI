<?php

// curl -XPOST -d 'token=abcdefg12345678' https://localhost:44395/api/members/
// curl -XPOST -d 'Name=StoneSwamp&Age=58&HireDate=2018-06-28T00:00:00' -H "Content-Type: application/json" https://localhost:44395/api/members/
// curl -XPOST -d 'Name=StoneSwamp&Age=58&HireDate=2018-06-28T00:00:00' -H "Content-Type: application/json" https://192.168.11.4:44395/api/members/

// API: DB_Ope_API

ini_set('display_errors', "On");

// API (Local)
$url = 'https://localhost:44395/api/members/';

$data = [
    "Name" => "Hideru",
    "age" => "28",
    'HireDate' => '2018-06-28T00:00:00',
];

$data = json_encode($data);

// ストリームコンテクストオプションを作成し、HTTPコンテクストオプションをセット
$options = [
//    'http' => [
    'ssl' => [
        'method'=> 'POST',
        'header'=> 'Content-type: application/json; charset=UTF-8',
        'content' => $data,
        'verify_peer' => false,
        'verify_peer_name' => false,
    ]
];

$context = stream_context_create($options);

// POST
$contents = file_get_contents($url, false, $context);

// レスポンスを表示
var_dump($http_response_header);
//echo $contents;