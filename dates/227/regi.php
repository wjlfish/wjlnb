<?php
ini_set('session.cookie_domain', '.wjlnb.com');
if(!isset($_POST['submit'])){
	exit('�����˲�Ҫ��ôðʧ��ֱ�ӵ����ɶҲû�С�<a href="login.html">ǰ����ȷ�ĵ�¼ҳ��</a>');
}
$username = $_POST['username'];
$regdate = time();
//�������ݿ������ļ�
include('conn.php');
$check_query = mysql_query("select * from  where username='$username' limit 1");
if(mysql_fetch_array($check_query)){        
        session_start();
	$_SESSION['username'] = 'okbutunkown';
        echo "<script>location.href='https://study.wjlnb.com/dates/227/pyspecial.php';</script>";
	exit;
}
$sql = "INSERT INTO twoeight(username,regdate)VALUES('$username',$regdate)";
ini_set("session.cookie_domain",'wjlnb.com');//ע���˾�������session_start()֮ǰ
session_start();
$_SESSION['username'] = $username;
if(mysql_query($sql,$conn)){
        echo "<script>location.href='https://study.wjlnb.com/dates/227/pyspecial.php';</script>";
} else {
	echo '��Ǹ��ע��ʧ�ܣ�',mysql_error(),'<br />';
	echo '����˴� <a href="javascript:history.back(-1);">����</a> ����';
}
?>
