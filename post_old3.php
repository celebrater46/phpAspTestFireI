<?php

// https://www.smartllc.jp/blog/20150811-how-to-post-json-in-php/ JSON形式のデータをPOST送受信する方法(PHP)
// API: DB_Ope_API

ini_set('display_errors', "On");

$url = 'https://localhost:44395/api/Members/';

$data = array(
    'Name' => 'StoneSwamp',
    'Age' => 58,
    'HireDate' => '2018-06-28T00:00:00',
);

$data_json = json_encode($data);

$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);
$result=curl_exec($ch);
//echo 'RETURN:'.$result;
curl_close($ch);

var_dump($result);


