<?php

// API: DB_Ope_API
// https://qiita.com/tokutoku393/items/3c3ba3ca581bc0381e35 PHPでHTTPリクエスト（cURL&PUTでパラメータを渡す際の注意）

ini_set('display_errors', "On");

$url = 'https://localhost:44395/api/Members/';

// curlの処理を始める合図
$curl = curl_init($url);

// リクエストのオプションをセットしていく
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET'); // メソッド指定
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 証明書の検証を行わない
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // レスポンスを文字列で受け取る

// レスポンスを変数に入れる
$response = curl_exec($curl);

// curlの処理を終了
curl_close($curl);

// テスト用
var_dump($response);