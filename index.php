<?php

// Refer: https://qiita.com/fantm21/items/603cbabf2e78cb08133e JSONの取得
// Refer: https://qiita.com/izanari/items/f4f96e11a2b01af72846 SSLエラーについて
// API: DB_Ope_API
// https://qiita.com/okdyy75/items/d21eb95f01b28f945cc6 PHP POST送信について

function getApi() {
    $url = "https://localhost:44395/api/members";

    $options['ssl']['verify_peer']=false;
    $options['ssl']['verify_peer_name']=false;

    //$json = file_get_contents($url);
    $json = file_get_contents($url, false, stream_context_create($options));
    $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $arr = json_decode($json,true);

    var_dump($arr);
}

function postApi() {
    $url = 'https://localhost:44395/api/members';

    $data = array(
        'msg' => 'メッセージ',
    );

    $context = array(
        'http' => array(
            'method'  => 'POST',
            'header'  => implode("\r\n", array('Content-Type: application/x-www-form-urlencoded',)),
            'content' => http_build_query($data)
        )
    );

    $html = file_get_contents($url, false, stream_context_create($context));

    var_dump($http_response_header);
    echo $html;
}

getApi();
//postApi();

