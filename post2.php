<?php

// https://qiita.com/okdyy75/items/d21eb95f01b28f945cc6 PHP POST送信について
// https://qiita.com/yousan/items/dc2cc789dcb0f07a61dc PHPの外部への接続でSSLのエラーが出てしまう@KUSANAGI PHP7.2
// API: DB_Ope_API


ini_set('display_errors', "On");
echo "Hello World" . PHP_EOL;


$CURLERR = NULL;

$data = array(
//    'msg' => 'メッセージ',
//    'id' => 4,
    'Name' => 'Aizawa',
    'Age' => 58,
    'HireDate' => '2021/08/18',
);

$url = 'https://localhost:44395/api/members';

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, TRUE);                            //POSTで送信
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));    //データをセット
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);                    //受け取ったデータを変数に
$html = curl_exec($ch);

if(curl_errno($ch)){        //curlでエラー発生
    $CURLERR .= 'curl_errno：' . curl_errno($ch) . "\n";
    $CURLERR .= 'curl_error：' . curl_error($ch) . "\n";
    $CURLERR .= '▼curl_getinfo' . "\n";
    foreach(curl_getinfo($ch) as $key => $val){
        $CURLERR .= '■' . $key . '：' . $val . "\n";
    }
    echo nl2br($CURLERR);
}
curl_close($ch);
echo $html;