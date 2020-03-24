<?php
ini_set("session.cookie_domain",'.wjlnb.com');
ini_set("session.cookie_domain",'.wjl.nx.cn');
ini_set("session.cookie_domain",'.050309.cn');
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
<!DOCTYPE html>
<head>
<meta property="og:title" content="空中课堂导航" />
<meta property="og:url" content="https://www.wjlnb.com/" />
<meta property="og:image" content="https://cdn.wjlnb.com/websources/img/yyj.jpg" />
<meta property="og:description" content="王嘉麟为唐中同学编写的空中课堂导航，可以快速找到任何你想要的学习资料" />
<meta itemprop="name" content="空中课堂导航" />
<meta itemprop="description" content="王嘉麟为唐中同学编写的空中课堂导航，可以快速找到任何你想要的学习资料" />
<meta itemprop="image" content="https://cdn.wjlnb.com/websources/img/yyj.jpg">
<meta charset="utf8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
<title>主页——空中课堂导航</title>
<link rel="stylesheet" type="text/css" href="https://cdn.wjlnb.com/websources/css/demo.css">
<link rel="stylesheet" type="text/css" href="https://cdn.wjlnb.com/websources/css/loading.css">
<link rel="stylesheet" type="text/css" href="https://cdn.wjlnb.com/websources/css/maina.css">
<link rel="stylesheet" type="text/css" href="https://cdn.wjlnb.com/websources/css/index.css">
<link rel="stylesheet" type="text/css" href="https://cdn.wjlnb.com/websources/css/reset.css">
<link rel="stylesheet" href="https://cdn.wjlnb.com/websources/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.wjlnb.com/websources/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://cdn.wjlnb.com/websources/css/fontAwesome.css">
<link rel="stylesheet" href="https://cdn.wjlnb.com/websources/css/light-box.css">
<link rel="stylesheet" href="https://cdn.wjlnb.com/websources/css/templatemo-style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800,900">
<link rel="shortcut icon" href="https://cdn.wjlnb.com/websources/img/favicon.ico" />
<script src="https://cdn.wjlnb.com/websources/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
<script src="https://cdn.wjlnb.com/websources/js/jquery.js"></script>
<script src="https://cdn.wjlnb.com/websources/js/baidutj.js"></script>
<script src="https://cdn.wjlnb.com/websources/js/baiduzz.js"></script>
<script src="https://cdn.wjlnb.com/websources/js/weather.js"></script>      
<script type="text/javascript">
host = window.location.host;
if (host=="study.wjlnb.com") 
{ 
window.location.href = 'https://www.wjlnb.com';
} else{
}
</script>
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
?>
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
<p></p>
<p></p>
<p>今日天气：<button id="tp-weather-widget"></button></p>
<p>lalala~~~</p>
<table width="100%" border="1" align="center">
  <tr>
    <td style="color:white">自选科目</td>
    <td style="color:white">下方链接</td>
 </tr>
  <tr>
    <td><button type="button" style="background-color:white;color:black;height:40px"onclick="geo()">地理</button></td>
    <td><a href="dates/specialone/geo" target="_blank">点我观看视频</a></td>
  </tr>
  <tr>
    <td><button type="button" style="background-color:white;color:black;height:40px"onclick="Bio()">生物</button></td>
    <td><a href="dates/specialone/Bio" target="_blank">点我观看视频</a></td>
  </tr>
  <tr>
    <td><button type="button" style="background-color:white;color:black;height:40px"onclick="his()">历史</button></td>
    <td><a href="dates/specialone/his" target="_blank">点我观看视频</a></td>
  </tr>
</table>
<p>
<p><a href="api/show/showindeximg" target="_blank">查看高清网页背景图请点这里</a></p>
<p>主站：<a href="https://www.wjlnb.com">wjlnb.com</a></p>
<p>第一分站：<a href="https://www.wjl.nx.cn">wjl.nx.cn</a></p>
<p>第二分站：<a href="https://www.050309.cn">050309.cn</a></p>
<p>自主短链接：<a href="https://w05.xyz">w05.xyz</a></p>
<p>早读默写入口：<a href="dingtalk://">打开钉钉</a></p>
<p>-Copyright © 2020 WJL-</p>
          </div>      


<script src="https://cdn.wjlnb.com/websources/js/app.js"></script>
</body>

</html>
