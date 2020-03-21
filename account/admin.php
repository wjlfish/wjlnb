<?php
header("Content-type: text/html; charset=utf-8");
session_start();
if($_SESSION['username'] == "adminwjl");
else
 echo '<script charset="utf-8">alert("You have no permission");window.history.go(-1);</script>';
?>
<!doctype html>
<head>
</head>
<body>
<p>6666666</p>
</body>
</html>