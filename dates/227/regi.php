<?php
ini_set('session.cookie_domain', '.wjlnb.com');
if(!isset($_POST['submit'])){
	exit('年轻人不要这么冒失，直接点击来啥也没有。<a href="login.html">前往正确的登录页面</a>');
}
$username = $_POST['username'];
$regdate = time();
//包含数据库连接文件
include('conn.php');
$check_query = mysql_query("select * from  where username='$username' limit 1");
if(mysql_fetch_array($check_query)){        
        session_start();
	$_SESSION['username'] = 'okbutunkown';
        echo "<script>location.href='https://study.wjlnb.com/dates/227/pyspecial.php';</script>";
	exit;
}
$sql = "INSERT INTO twoeight(username,regdate)VALUES('$username',$regdate)";
ini_set("session.cookie_domain",'wjlnb.com');//注：此句必须放在session_start()之前
session_start();
$_SESSION['username'] = $username;
if(mysql_query($sql,$conn)){
        echo "<script>location.href='https://study.wjlnb.com/dates/227/pyspecial.php';</script>";
} else {
	echo '抱歉！注册失败：',mysql_error(),'<br />';
	echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';
}
?>
