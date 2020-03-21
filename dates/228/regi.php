<?php
function getip() {
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP") , "unknown")) {
        $ip = getenv("HTTP_CLIENT_IP");
    } else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR") , "unknown")) {
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    } else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR") , "unknown")) {
        $ip = getenv("REMOTE_ADDR");
    } else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
        $ip = $_SERVER['REMOTE_ADDR'];
    } else {
        $ip = "unknown";
    }
    return $ip;
}
ini_set('session.cookie_domain', '.wjlnb.com');
if(!isset($_POST['submit'])){
	exit('年轻人不要这么冒失，直接点击来啥也没有。<a href="login.html">前往正确的登录页面</a>');
}
$username = $_POST['username'];
$regdate = time();
$ip = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
$ip = getip();
//包含数据库连接文件
include('conn.php');
$check_query = mysql_query("select * from twoeight where username='$username' limit 1");
if(mysql_fetch_array($check_query)){        
        session_start();
	$_SESSION['username'] = 'okbutunkown';
        echo "<script>location.href='https://study.wjlnb.com/dates/228/pyspecial.php';</script>";
	exit;
}
$sql = "INSERT INTO twoeight(username,regdate,ip)VALUES('$username',$regdate,'$ip')";
ini_set("session.cookie_domain",'wjlnb.com');//注：此句必须放在session_start()之前
session_start();
$_SESSION['username'] = $username;
if(mysql_query($sql,$conn)){
        echo "<script>location.href='https://study.wjlnb.com/dates/228/pyspecial';</script>";
} else {
	echo '抱歉！注册失败：',mysql_error(),'<br />';
	echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';
}
?>
