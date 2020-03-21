<?php
include_once("conn.php");

$email = stripslashes(trim($_POST['email']));
$email = injectChk($email);

$sql = "SELECT id,username,password FROM `r_user` WHERE email=:email";
$stmt = $db->prepare($sql);
$stmt->execute(array(
    ':email' => $email
));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row) {
    $getpasstime = time();
    $uid = $row['id'];
    $retoken = md5($uid.$row['username'].$row['password']);
    $url = "https://www.wjlnb.com/account/reset/reset.php?email=".$email."&token=".$retoken;
    $time = date('Y-m-d H:i');
    $result = sendmail($time,$email,$url);
    if($result==1){//邮件发送成功
        $msg = '系统已向您的邮箱发送了一封邮件<br/>请登录到您的邮箱及时重置您的密码！';
        //更新数据发送时间
        $sql_update = "UPDATE `r_user` SET getpasstime=:getpasstime WHERE id=:id";
        $stmt_update = $db->prepare($sql_update);
        $stmt_update->execute(array(
            ':id' => $uid,
            ':getpasstime' => $getpasstime
        ));
    }else{
        $msg = $result;
    }
    echo $msg;
} else {
    echo 'noreg';
}

function sendmail($time,$email,$url){
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
    $emailsubject = "wjlnb.com - 找回密码";
    $emailbody = "亲爱的".$email."：<br/>您在".$time."提交了找回密码请求。请点击下面的链接重置密码（按钮24小时内有效）。<br/><a href='".$url."' target='_blank'>".$url."</a><br/>如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问。<br/>如果您没有提交找回密码请求，请忽略此邮件。";
    $rs = $smtp->sendmail($smtpemailto, $smtpemailfrom, $emailsubject, $emailbody, $emailtype);
	return $rs;
}

function injectChk($sql_str) { //防止注入
		$check = eregi('select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $sql_str);
		if ($check) {
			echo('非法字符串');
			exit ();
		} else {
			return $sql_str;
		}
}
?>