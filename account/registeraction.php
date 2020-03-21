<?php
header("Content-type: text/html; charset=utf-8");
/*function send_post($url, $post_data)  
{  
    $postdata = http_build_query($post_data);  
    $options = array(  
        'http' => array(  
            'method' => 'POST',  
            'header' => 'Content-type:application/x-www-form-urlencoded',  
            'content' => $postdata,  
            'timeout' => 15 * 60 // 超时时间（单位:s）  
        )  
    );  
    $context = stream_context_create($options);  
    $result = file_get_contents($url, false, $context);  
    return $result;  
}  
              
$post_data = array(          
'secret' => '6LcC494UAAAAACatFBzVOn6uHCW4XqqDPyAI8UbM',          
'response' => $_POST["g-recaptcha-response"]    );  
    $recaptcha_json_result = send_post('https://recaptcha.net/recaptcha/api/siteverify', $post_data);     
 $recaptcha_result = json_decode($recaptcha_json_result,true);     
if($recaptcha_result["success"]== "bool(true)"){    

}
else{
echo '<script>alert("请点击验证码验证！")</script>';
echo "<script>window.history.go(-1);</script>";
}*/

include_once("conn.php");
if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
	exit;
}

$username = trim($_POST['username']);
//检测用户名是否存在
$sql = "SELECT id FROM `r_user` WHERE username=:username";
$stmt = $db->prepare($sql);
$stmt->execute(array(
    ':username' => $username
));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row) {
    echo '<script>alert("用户名已存在，请换个其他的用户名");window.history.go(-1);</script>';
    exit;
}

$password = md5(trim($_POST['password']));
$email = trim($_POST['email']);
$isEmail = filter_var($email, FILTER_VALIDATE_EMAIL); 
if ($isEmail === false) {
    echo '<script>alert("邮箱名非法！");window.history.go(-1);</script>';
    exit;
}

$regtime = time();

$token = md5($username.$password.$regtime); //创建用于激活识别码
$token_exptime = time()+60*60*24;//过期时间为24小时后

$sql_insert = "INSERT INTO `r_user` (`username`,`password`,`email`,`token`,`token_exptime`,`regtime`) VALUES (:username,:password,:email,:token,:token_exptime,:regtime)";
$stmt = $db->prepare($sql_insert);
$stmt->execute(array(
    ':username' => $username,
    ':password' => $password,
    ':email' => $email,
    ':token' => $token,
    ':token_exptime' => $token_exptime,
    ':regtime' => $regtime
));
$insert_id = $db->lastinsertid();
if ($insert_id) {
    include_once("smtp.class.php");
    $smtpserver = "smtp.exmail.qq.com"; //SMTP服务器
    $smtpserverport = 25; //SMTP服务器端口
    $smtpusermail = "wangjialin@wjlnb.com"; //SMTP服务器的用户邮箱
    $smtpuser = "wangjialin@wjlnb.com"; //SMTP服务器的用户帐号
    $smtppass = "Chuyinpast666"; //SMTP服务器的用户密码
    $smtp = new Smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass); //这里面的一个true是表示使用身份验证,否则不使用身份验证.
    $emailtype = "HTML"; //信件类型，文本:text；网页：HTML
    $smtpemailto = $email;
    $smtpemailfrom = $smtpusermail;
    $emailsubject = "wjlnb.com用户帐号激活";
    //$emailbody = '123';
    $emailbody = "亲爱的".$username."：<br/>感谢您在我站注册了新帐号。<br/>请点击链接激活您的帐号。<br/><a href='https://www.wjlnb.com/account/active.php?verify=".$token."' target='_blank'>https://www.wjlnb.com/account/active.php?verify=".$token."</a><br/>如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。<br/>如果此次激活请求非你本人所发，请忽略本邮件。<br/><p style='text-align:right'>-------- wjlnb.com 敬上</p>";
    $rs = $smtp->sendmail($smtpemailto, $smtpemailfrom, $emailsubject, $emailbody, $emailtype);
    if($rs==1){
        $msg = '恭喜您，注册成功！<br/>请登录到您的邮箱及时激活您的帐号！';   
    }else{
        $msg = $rs; 
    }
} else {
    $msg = '服务器忙，请稍后再试';
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>注册中</title>
<link rel="stylesheet" type="text/css" href="../css/main.css" />
<style type="text/css">
.demo{width:400px; margin:40px auto 0 auto; min-height:250px;}
.demo h3{line-height:40px; padding:4px; text-align:center; font-size:20px; color:#360}
</style>
</head>

<body>
<div id="header">
   <div id="logo"><h1></h1></div>
</div>

<div id="main">
   <h2 class="top_title"></h2>
   <div class="demo">
   		<h3><?php echo $msg;?></h3>
	</div>
</div>

<div id="footer">
    <p></p>
</div>
</body>
</html>