<?php
include_once("conn.php");

$verify = stripslashes(trim($_GET['verify']));
$nowtime = time();

$sql = "SELECT id,token_exptime FROM `r_user` WHERE status='0' AND token=:token";
$stmt = $db->prepare($sql);
$stmt->execute(array(
    ':token' => $verify
));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row) {
	if ($nowtime > $row['token_exptime']) { //30min
		$msg = '您的激活有效期已过，请登录您的帐号重新发送激活邮件.';
	} else {
        $sql_update = "UPDATE `r_user` SET status=1 WHERE id=:id";
        $stmt_update = $db->prepare($sql_update);
        $stmt_update->execute(array(
            ':id' => $row['id']
        ));
        if ($stmt->rowCount()) {
            $msg = '激活成功！正在加载，请稍等...<br>三秒后自动跳转到登录页面~~~<br>若没有自动跳转，请<a href="login">点击这里</a>去登录<br/>';
    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $result['id'];
    header("refresh:3;url=person");
 /*header("refresh:3;url=login");*/
        } else {
            $msg = '啊呜，出错啦。。。。';
        }
	}
} else {
	$msg = '啊呜，出错啦。。。';	
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>激活</title>
<link rel="stylesheet" type="text/css" href="../css/main.css" />
<style type="text/css">
.demo{width:400px; margin:40px auto 0 auto; min-height:200px;}
.demo h3{line-height:40px; padding:4px; text-align:center; font-size:20px; color:#360}
</style>
</head>

<body>
<div id="header">
   <div id="logo"></h1></div>
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