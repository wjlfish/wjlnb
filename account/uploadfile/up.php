<?php
require 'sdk/vendor/autoload.php';
$secretId = "AKIDDFshHfW2uiP9rPA5EPN6nbDZpsdBGWfc"; //"云 API 密钥 SecretId";
$secretKey = "ub3TefwHPIwKn22YAPTKzkGoqJalrtEW"; //"云 API 密钥 SecretKey";
$region = "ap-chengdu"; //设置一个默认的存储桶地域
$cosClient = new Qcloud\Cos\Client(
    array(
        'region' => $region,
        'schema' => 'https', //协议头部，默认为http
        'credentials'=> array(
            'secretId'  => $secretId ,
            'secretKey' => $secretKey)));
try {
    //请求成功
    $result = $cosClient->listBuckets();
    print_r($result);
} catch (\Exception $e) {
    //请求失败
    echo($e);
}