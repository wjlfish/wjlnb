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
            $msg = '激活成功！<br/>这是一个演示，helloweba会定期清除demo中您的注册信息。';
        } else {
            $msg = '服务器忙！';
        }
	}
} else {
	$msg = 'error.';	
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>演示：PHP用户注册邮箱验证激活帐号</title>
<link rel="stylesheet" type="text/css" href="../css/main.css" />
<style type="text/css">
.demo{width:400px; margin:40px auto 0 auto; min-height:200px;}
.demo h3{line-height:40px; padding:4px; text-align:center; font-size:20px; color:#360}
</style>
</head>

<body>
<div id="header">
   <div id="logo"><h1><a href="http://www.helloweba.com" title="返回helloweba首页">helloweba</a></h1></div>
</div>

<div id="main">
   <h2 class="top_title"><a href="http://www.helloweba.com/view-blog-228.html">PHP用户注册邮箱验证激活帐号</a></h2>
   <div class="demo">
   		<h3><?php echo $msg;?></h3>
	</div>
</div>

<div id="footer">
    <p>Powered by helloweba.com  允许转载、修改和使用本站的DEMO，但请注明出处：<a href="http://www.helloweba.com">www.helloweba.com</a></p>
</div>
</body>
</html>