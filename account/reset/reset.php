<!doctype html> 
<html> 
<head> 
<meta charset="UTF-8"> 
<title>正在修改密码</title> 
</head> 
<body> 
 <?php 
 session_start (); 
 $username = $_REQUEST ["username"]; 
 $oldpassword = $_REQUEST ["oldpassword"]; 
 $newpassword = $_REQUEST ["newpassword"]; 
 
$con = mysql_connect ( "localhost", "3h7eizi29i222", "wjl20050309" ); 
 if (! $con) { 
 die ( '数据库连接失败' . $mysql_error () ); 
 } 
 mysql_select_db ( "3h7eizi29i222", $con );
 $result = mysql_query ( "select * from r_user where username ='$username';" ); 
 while ( $row = mysql_fetch_array ( $result ) ) { 
 $dbusername = $row ["username"]; 
 $dbpassword = $row ["password"]; 
 } 
 if (is_null ( $dbusername )) { 
 ?> 
 <script type="text/javascript"> 
 alert("用户名不存在"); 
 window.location.href="index.html"; 
 </script> 
 <?php 
 } 
 if ($oldpassword != $dbpassword) { 
 ?> 
 <script type="text/javascript"> 
 alert("密码错误"); 
 window.location.href="index.html"; 
 </script> 
 <?php 
 } 
 mysql_query ( "update user_info set password='$newpassword' where username='$username'" ) or die ( "存入数据库失败" . mysql_error () );//如果上述用户名密码判定不错，则update进数据库中 
 mysql_close ( $con ); 
 ?> 
 
 
 <script type="text/javascript"> 
 alert("密码修改成功"); 
 window.location.href="index.html"; 
 </script> 
</body> 
</html> 
