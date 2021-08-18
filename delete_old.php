<?php

// https://qiita.com/okdyy75/items/d21eb95f01b28f945cc6 PHP POST送信について
// API: DB_Ope_API

ini_set('display_errors', "On");
echo "Hello World" . PHP_EOL;

$url = 'https://localhost:44395/api/members/3';

//$data = array(
//    'Name' => 'Aizawa',
//    'Age' => '58',
//    'HireDate' => '2021/08/18',
//);

$context = array(
//    'http' => array( // Warning: file_get_contents(): SSL operation failed with code 1. OpenSSL Error messages: error:1416F086:SSL routines:tls_process_server_certificate:certificate verify failed
    'ssl' => array(
        'method'  => 'DELETE',
        'verify_peer' => false,
        'verify_peer_name' => false,
    )
);

$html = file_get_contents($url, false, stream_context_create($context));

var_dump($http_response_header);
echo $html;