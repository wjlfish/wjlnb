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
	exit('�����˲�Ҫ��ôðʧ��ֱ�ӵ����ɶҲû�С�<a href="login.html">ǰ����ȷ�ĵ�¼ҳ��</a>');
}
$username = $_POST['username'];
$regdate = time();
$ip = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
$ip = getip();
//�������ݿ������ļ�
include('conn.php');
$check_query = mysql_query("select * from twoeight where username='$username' limit 1");
if(mysql_fetch_array($check_query)){        
        session_start();
	$_SESSION['username'] = 'okbutunkown';
        echo "<script>location.href='https://study.wjlnb.com/dates/228/pyspecial.php';</script>";
	exit;
}
$sql = "INSERT INTO twoeight(username,regdate,ip)VALUES('$username',$regdate,'$ip')";
ini_set("session.cookie_domain",'wjlnb.com');//ע���˾�������session_start()֮ǰ
session_start();
$_SESSION['username'] = $username;
if(mysql_query($sql,$conn)){
        echo "<script>location.href='https://study.wjlnb.com/dates/228/pyspecial';</script>";
} else {
	echo '��Ǹ��ע��ʧ�ܣ�',mysql_error(),'<br />';
	echo '����˴� <a href="javascript:history.back(-1);">����</a> ����';
}
?>
