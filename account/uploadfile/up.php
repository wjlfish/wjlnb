<?php
require 'sdk/vendor/autoload.php';
$secretId = "AKIDDFshHfW2uiP9rPA5EPN6nbDZpsdBGWfc"; //"�� API ��Կ SecretId";
$secretKey = "ub3TefwHPIwKn22YAPTKzkGoqJalrtEW"; //"�� API ��Կ SecretKey";
$region = "ap-chengdu"; //����һ��Ĭ�ϵĴ洢Ͱ����
$cosClient = new Qcloud\Cos\Client(
    array(
        'region' => $region,
        'schema' => 'https', //Э��ͷ����Ĭ��Ϊhttp
        'credentials'=> array(
            'secretId'  => $secretId ,
            'secretKey' => $secretKey)));
try {
    //����ɹ�
    $result = $cosClient->listBuckets();
    print_r($result);
} catch (\Exception $e) {
    //����ʧ��
    echo($e);
}