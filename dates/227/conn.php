<?php
/*****************************
*���ݿ�����
*****************************/
$conn = @mysql_connect("localhost","3h7eizi29i222","wjl20050309");
if (!$conn){
	die("�������ݿ�ʧ�ܣ�" . mysql_error());
}
mysql_select_db("3h7eizi29i222", $conn);
//�ַ�ת��������
mysql_query("set character set 'gbk'");
//д��
mysql_query("set names 'gbk'");
?>