<?php
header("Content-Type: text/html; charset=utf8");
ini_set("session.cookie_domain",'.wjlnb.com');
ini_set("session.cookie_domain",'.wjl.nx.cn');
ini_set("session.cookie_domain",'.050309.cn');
session_name('sso_wjlnb_id');
session_start();
//注销登录
if($_GET['action'] == "logout"){
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    echo '<script language="JavaScript">;alert("注销成功");location.href="/";</script>;';
    exit;
}

//登录
if(!isset($_POST['submit'])){
    exit('您目前访问的是网站后台程序，请前往正确的登页面!');
}
$username = htmlspecialchars($_POST['username']);
$password = MD5($_POST['password']);
//包含数据库连接文件
include('connb.php');
//检测用户名及密码是否正确
$check_query = mysql_query("select id from r_user where username='$username' and password='$password' 
limit 1");
if($result = mysql_fetch_array($check_query)){
    //登录成功
    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $result['id'];
    /*echo '<script language="JavaScript">;alert("登录成功");location.href="/";</script>;';
    echo '<script>alert("登录成功！")</script>';*/
    header("Location: /");
    exit;
} else {
    echo '<script>alert("登录失败，请检查信息后重试！")</script>';
    echo '<script>window.history.go(-1);</script>';
    exit;
}
?>
