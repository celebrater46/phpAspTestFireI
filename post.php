<?php

// https://qiita.com/okdyy75/items/d21eb95f01b28f945cc6 PHP POST送信について
// API: DB_Ope_API

$url = 'https://localhost:44395/api/members';

$data = array(
    'name' => 'Aizawa',
    'age' => '58',
    'fireDate' => '2021/08/18',
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
//    echo $html;