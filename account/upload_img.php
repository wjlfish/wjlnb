<?php
//    通过使用 PHP 的全局数组 $_FILES，你可以从客户计算机向远程服务器上传文件。
    $filename=$_FILES["file"]["name"];
    $filesize=$_FILES["file"]["size"];
    $filetmp_name=$_FILES["file"]["tmp_name"];
    $filetype=$_FILES["file"]["type"];
    $rs=astrict($filename,$filesize,$filetmp_name,$filetype);
    
    if ($rs=='onlyjpg' ||$rs=='big' || $rs=='dengrous'){
        exit(json_encode(array('code'=>'0','msg'=>$rs)));
    }
//    explode：将字符串打散为数组
    $ns=explode('.',$rs);
    if (count($ns)<2){
        exit($transCountImg[$rs]);
    }
    require('cosv4/include.php');
    use Qcloud\Cos\Api;
    $config = array(
        'app_id' => '1258252864',
        'secret_id' => 'AKIDJRYYXNV3CE84rToNfQ4XqzxxIdHnqQek',
        'secret_key' => '5Vu9HC4kEXi7VmvseP3av7KOHMPo4DDp',
        'region' => 'cd',
        'timeout' => 60
    );
    date_default_timezone_set('PRC');
    $cosApi = new Api($config);
    $y=date('Y');
    $m=date('m');
    $nad=basename($rs);
    $dst='/img/'.$y.'/'.$m.'/'.$nad;
    $buffer='wjl';
    $rets=$cosApi->upload($buffer,$rs,$dst);
//    var_dump($rets);
    if ($rets['code'] !='0' || strtoupper($rets["message"]) !='SUCCESS'){
        exit($rets["message"]);
    }
//    图片上传到腾讯云后，删除服务器对应文件夹的图片
    exec("rm -rf $rs");
    $url=$rets["data"]["source_url"];
    $url=str_replace('http://','https://',$url);
    exit(json_encode(array('code'=>'1','msg'=>$url)));
    
    function astrict($picName,$picSize,$picTemp,$picType){
        $rd=getimagesize($picTemp);
        //限制图片的内容只能为jpg和png
        if ($rd['mime'] != 'image/jpeg' && $rd['mime'] !='image/png'){
            return 'onlyjpg';
            exit();
        }
        if ($picName != ""){
            //限制图片大小
            if ($picSize > 2097152){
                return "big";
                exit();
            }
            //判断图片类型
            if ($picType !='image/jpeg' && $picType !="iamge/png"){
                return 'onlyjpg';
                exit();
            }
        }
        $rand=rand(100,999);
        $pics=md5(date("YmdHis").$rand).".jpg";
        $src = './upload/' . $pics;
        //检测不良字符串
        if (file_exists($picTemp)) {
            $resource = fopen($picTemp, 'rb');
            $fileSize = filesize($picTemp);
            fseek($resource, 0);
        } else {
            exit($transCountImg["existent"]);
        }
        if ($fileSize > 512) { // 取头和尾
            $hexCode = bin2hex(fread($resource, 512));
            fseek($resource, $fileSize - 512);
            $hexCode .= bin2hex(fread($resource, 512));
        } else { // 取全部
            $hexCode = bin2hex(fread($resource, $fileSize));
        }
        fclose($resource);
        if (preg_match("/(3c25.*?28.*?29.*?253e)|(3c3f.*?28.*?29.*?3f3e)|(3C534352495054)|(2F5343524950543E)|(3C736372697074)|(2F7363726970743E)/is", $hexCode)) {
            return 'dengrous';
            exit();
        }
        move_uploaded_file($picTemp,$src);
        return $src;
    }