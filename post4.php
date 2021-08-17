<?php

// API: DB_Ope_API

ini_set('display_errors', "On");

// API (Local)
$url = 'https://localhost:44395/api/members/';

$data = [
    "Name" => "StoneSwamp",
    "age" => "58",
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