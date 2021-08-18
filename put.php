<?php

// API: DB_Ope_API
// https://qiita.com/tokutoku393/items/3c3ba3ca581bc0381e35 PHPでHTTPリクエスト（cURL&PUTでパラメータを渡す際の注意）

ini_set('display_errors', "On");

$url = 'https://localhost:44395/api/Members/10/';

$data = array(
//    'id' => '12',
    'Name' => 'Sally',
    'Age' => '34',
    'HireDate' => '2018-06-28T00:00:00',
);

$json = json_encode($data); // JSONに変換

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT'); // ※
//curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params)); // ※
curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);

var_dump($response);
echo "Hello World";