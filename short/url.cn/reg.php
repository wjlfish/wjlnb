<?php
session_start();
$a = $_SESSION['urlgot'];
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
	<title>在线短网址生成</title>
	<meta charset="gbk">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="icon" href="https://wjl-1258252864.cos.ap-chengdu.myqcloud.com/img/favicon.ico" sizes="32x32">
   <script type="text/javascript" src="https://libs.baidu.com/jquery/1.7.2/jquery.js"></script>
<script>
    $.post("geturl.php",data,function(ddurl){
      $("#msg").text(ddurl); 
    })
}) 
</script>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('https://wjl-1258252864.cos.ap-chengdu.myqcloud.com/img/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" action="geturl.php" method="post" onsubmit="return chk_form();">
					<span class="login100-form-title p-b-49">在线短网址生成</span>



					<div class="wrap-input100 validate-input m-b-23" data-validate="请输入长链接">
						<span class="label-input100">长链接</span>
						<input class="input100" type="text" name="longurl" placeholder="请输入长链接" autocomplete="off"  required="required">
						<span class="focus-input100" data-symbol="*"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-23">
						              <?php echo '长链接是：',$a,'</br>'; ?>
					</div>
                                

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
          <button class="login100-form-btn" type="submit" name="submit" >生成短网址</button>
						</div>
					</div>
                                         <div class="flex-col-c p-t-25">
						<a href="geturl.php?action=redo">再生成一个</a>
						<a href="geturl.php?action=leave">主页</a>
					</div>

				</form>
			</div>
		</div>
	</div>

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>