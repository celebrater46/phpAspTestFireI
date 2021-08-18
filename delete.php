<?php

// API: DB_Ope_API
// https://qiita.com/tokutoku393/items/3c3ba3ca581bc0381e35 PHPでHTTPリクエスト（cURL&PUTでパラメータを渡す際の注意）
// Warning: Undefined variable $http_response_header in C:\xampp\htdocs\myapps\PhpAspTestFireStone\delete.php on line 18
// しかし削除自体は成功

$url = 'https://localhost:44395/api/Members/7';

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);

// テスト用
var_dump($response);
var_dump($http_response_header);
//echo $response;
//echo "Hello World";