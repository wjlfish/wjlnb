<?php
/*****************************
*���ݿ�����
*****************************/
$conn = @mysql_connect("localhost","emmmmm","emmmmm");
if (!$conn){
	die("�������ݿ�ʧ�ܣ�" . mysql_error());
}
mysql_select_db("3h7eizi29i222", $conn);
//�ַ�ת��������
mysql_query("set character set 'utf-8'");
//д��
mysql_query("set names 'utf-8'");
?>