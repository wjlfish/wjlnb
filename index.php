<?php
session_name('sso_wjlnb_id');
session_start();
$urls = array(
    'https://www.wjlnb.com',
);
$api = 'http://data.zz.baidu.com/urls?site=www.wjlnb.com&token=argb8VcDDtE23Jvb';
$ch = curl_init();
$options =  array(
    CURLOPT_URL => $api,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => implode("\n", $urls),
    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
);
curl_setopt_array($ch, $options);
$result = curl_exec($ch);
?>
<!--不说别的，我网页写的太他妈工整了-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
<title>主页 (゜-゜)つロ干杯——初音过去学习站</title>
<link rel="stylesheet" type="text/css" href="https://cdn.wjlnb.com/websources/css/demo.css">
<link rel="stylesheet" type="text/css" href="https://cdn.wjlnb.com/websources/css/loading.css">
<link rel="stylesheet" type="text/css" href="https://cdn.wjlnb.com/websources/css/maina.css">
<link rel="stylesheet" type="text/css" href="https://cdn.wjlnb.com/websources/css/index.css">
<link rel="stylesheet" type="text/css" href="https://cdn.wjlnb.com/websources/css/reset.css">
<link rel="stylesheet" type="text/css" href="https://cdn.wjlnb.com/websources/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.wjlnb.com/websources/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.wjlnb.com/websources/css/fontAwesome.css">
<link rel="stylesheet" type="text/css" href="https://cdn.wjlnb.com/websources/css/light-box.css">
<link rel="stylesheet" type="text/css" href="https://cdn.wjlnb.com/websources/css/templatemo-style.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800,900">
<link rel="shortcut icon" href="https://cdn.wjlnb.com/websources/img/favicon.ico" />
<script src="https://cdn.wjlnb.com/websources/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
<script src="https://cdn.wjlnb.com/websources/js/jquery.js"></script>
<script src="https://cdn.wjlnb.com/websources/js/baidutj.js"></script>
<script src="https://cdn.wjlnb.com/websources/js/baiduzz.js"></script>
<script src="https://cdn.wjlnb.com/websources/js/weather.js"></script>  
</head>

<body>


<nav>
        <div class="logo">
   <a href="/">导航</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php 
	if(isset($_SESSION['username'])){ 		
        echo "<a href='account/'>{$_SESSION['username']}</a>";   //若session值存在则显示session值即用户名，且链接指向个人空间
	}
	else{
		echo "<a href='account/login' style='letter-spacing:2px;'>登录</a> <a>|</a> <a href='account/reg' style='letter-spacing:2px;'>注册</a>";  //若session值不存在则显示登录，链接指向登录页面
	}
?><button style="color:white" id="tp-weather-widget"></button>
        </div>

    </nav>

    <div id="video-container">

        <div class="video-content">
            <div class="inner">

<div class="page-loading__icon"></div>

<div class="frosted-panel" panel-dimensions="100% 100%" breakpoint-type="min-width" breakpoints="100% 100% 100%, 100%100% 100%">

	<svg>
		<filter id="blurMe" filterRes="1200" color-interpolation-filters="sRGB">
			<feGaussianBlur in="SourceGraphic" stdDeviation="7" />
		</filter>

		<image xlink:href="https://www.wjlnb.com/api/bingimg" x="0" y="0" width="1920" height="1080" filter="url(#blurMe)" />
	</svg>

	<div class="content" content-margin="5px">
<div class="inner">
<p>空中课堂结束了，网站好像没什么用啦~~</p>
<p><a href="api/show/showindeximg" target="_blank">点击查看高清网页背景图</a></p>
<p><a href="https://dl.wjlnb.com/download/zhongkao" target="_blank">点击下载语文中考复习资料</a></p>
<p>当前站点：<?php echo $_SERVER['HTTP_HOST']; ?></p>
<p>主站：<a href="https://www.wjlnb.com">wjlnb.com</a></p>
<p>第一分站：<a href="https://www.wjl.nx.cn">wjl.nx.cn</a></p>
<p>第二分站：<a href="https://www.050309.cn">050309.cn</a></p>
<p>自主短链接：<a href="https://w05.xyz" target="_blank">w05.xyz</a></p>
<p><a href="https://github.com/wjlfish/wjlnbgit" target="_blank">github代码托管</a></p>
<p>-Copyright © 2020 wjlnb.com-</p>
          </div>      
<!--实验多网站异步登录功能，失败啦，暂时废弃，我肯定还会再试的~~~
<iframe width="0” height="0” src="https://www.wjlnb.com/account/set_cookie.php?sessionid=$sessionid&key=$key"></iframe>
-->
<script src="https://cdn.wjlnb.com/websources/js/app.js"></script>
</body>

</html>
