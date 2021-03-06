<?php
session_name('wjlnb_id');
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
<meta property="og:image" content="https://wjl-1258252864.cos.ap-chengdu.myqcloud.com/img/yyj.jpg" />
<meta property="og:description" content="王嘉麟为唐中同学编写的空中课堂导航，可以快速找到任何你想要的学习资料" />
<meta itemprop="name" content="空中课堂导航" />
<meta itemprop="description" content="王嘉麟为唐中同学编写的空中课堂导航，可以快速找到任何你想要的学习资料" />
<meta itemprop="image" content="https://wjl-1258252864.cos.ap-chengdu.myqcloud.com/img/yyj.jpg">
<meta charset="utf8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
<title>课程页面——空中课堂导航</title>
<link rel="stylesheet" type="text/css" href="https://wjl-1258252864.cos.ap-chengdu.myqcloud.com/websources/css/demo.css">
<link rel="stylesheet" type="text/css" href="https://wjl-1258252864.cos.ap-chengdu.myqcloud.com/websources/css/loading.css">
<link rel="stylesheet" type="text/css" href="https://wjl-1258252864.cos.ap-chengdu.myqcloud.com/websources/css/maina.css">
<link rel="stylesheet" type="text/css" href="https://wjl-1258252864.cos.ap-chengdu.myqcloud.com/websources/css/index.css">
<link rel="stylesheet" type="text/css" href="https://wjl-1258252864.cos.ap-chengdu.myqcloud.com/websources/css/reset.css">
<link rel="stylesheet" href="https://wjl-1258252864.cos.ap-chengdu.myqcloud.com/websources/css/bootstrap.min.css">
<link rel="stylesheet" href="https://wjl-1258252864.cos.ap-chengdu.myqcloud.com/websources/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://wjl-1258252864.cos.ap-chengdu.myqcloud.com/websources/css/fontAwesome.css">
<link rel="stylesheet" href="https://wjl-1258252864.cos.ap-chengdu.myqcloud.com/websources/css/light-box.css">
<link rel="stylesheet" href="https://wjl-1258252864.cos.ap-chengdu.myqcloud.com/websources/css/templatemo-style.css">
<link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<link rel="icon" href="https://wjl-1258252864.cos.ap-chengdu.myqcloud.com/img/niu.jpg" sizes="32x32">
<script src="https://cdn.staticfile.org/jquery/1.11.1/jquery.js"></script>
<script src="https://wjl-1258252864.cos.ap-chengdu.myqcloud.com/websources/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
<script src="https://wjl-1258252864.cos.ap-chengdu.myqcloud.com/websources/js/baidutj.js"></script>
<script src="https://wjl-1258252864.cos.ap-chengdu.myqcloud.com/websources/js/baiduzz.js"></script>
<script src="https://wjl-1258252864.cos.ap-chengdu.myqcloud.com/websources/js/weather.js"></script>      
<script src="https://wjl-1258252864.cos.ap-chengdu.myqcloud.com/websources/js/nocopy.js"></script>   
<style type="text/css">
body,td,th {
	font-family: Kanit, sans-serif;
	text-align: center;
}
</style>
<script type="text/javascript">
function wemeet(){
	alert('点击此链接前，请确保您的手机或电脑上安装了腾讯会议。若提示链接无效请先检查是否安装。');
        window.location.href='https://meeting.tencent.com/detail.html?token=Uo7n100I-V62caTZAXuT7paEoFEZZHNr-Eh27I8-yv7H18w2gAMJ7w__&meetingcode=329772492&sdkappid=1400115281&show8k=0&from=singlemessage&isappinstalled=0';
}
</script>
<script type="text/javascript">
function dd(){
	alert('点击此链接前，请确保您的手机或电脑上安装了钉钉。若提示链接无效请先检查是否安装。');
        window.location.href='dingtalk://'; 
}
</script>
<script type="text/javascript">
function bilibili(){
	alert('物理于bilibili直播课程，将会为您跳转到哔哩哔哩');
        window.location.href='https://live.bilibili.com/21957030'; 
}
</script>
<script type="text/javascript">
function localma(){
	alert('数学日常课程是本地视频教学，将为您跳转至课程页面');
        window.location.href='dates/320/ma'; 
}
</script>
<script type="text/javascript">
function rest(){
	alert('午间休息');
}
</script>
<script type="text/javascript">
function localch(){
	alert('化学日常课程是本地视频教学，将为您跳转至课程页面');
        window.location.href='dates/320/ch'; 
}
</script>
<script type="text/javascript">
function geo(){
	alert('地理课程是本地视频教学，将为您跳转至课程页面');
        window.location.href='dates/320/geo'; 
}
</script>
<script type="text/javascript">
function Bio(){
	alert('生物课程是本地视频教学，将为您跳转至课程页面');
        window.location.href='dates/320/Bio'; 
}
</script>
<script type="text/javascript">
function his(){
	alert('历史课程是本地视频教学，将为您跳转至课程页面');
        window.location.href='dates/320/his'; 
}
</script>
<script type="text/javascript">
host = window.location.host;
if (host=="www.wjlnb.com") 
{ 
} else{
window.location.href = 'https://www.wjlnb.com';
}
</script>
</head>

<body>


<nav>
        <div class="logo">
   <a href="/">主页</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php 
	if(isset($_SESSION['username'])){ 		
        echo "<a href='https://www.wjlnb.com/account/'>{$_SESSION['username']}</a>";   //若session值存在则显示session值即用户名，且链接指向个人空间
	}
	else{
		echo "<a href='https://www.wjlnb.com/account/login' style='letter-spacing:2px;'>登录</a> <a>|</a> <a href='https://www.wjlnb.com/account/reg' style='letter-spacing:2px;'>注册</a>";  //若session值不存在则显示登录，链接指向登录页面
	}
?>
        </div>
 <button type="button" style="background-color:white;color:black;" id="tp-weather-widget">
 </button>
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

		<image xlink:href="https://www.wjlnb.com/api/bingimg.php" x="0" y="0" width="1920" height="1080" filter="url(#blurMe)" />
	</svg>

	<div class="content" content-margin="5px">
<div class="inner">
<p>请返回主页获取今日课程</p>

          </div>

        </div>

    </div>               

		</div>
		
	</div>
	
</div>
     <footer>
        <div class="container-fluid">
            <div class="col-md-12">
<p class="scroll_top">COPYRIGHT © 2020 <a href="https://www.wjlnb.com">wjlnb.com</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://tongji.baidu.com/web/10000149852/overview/index?siteId=14397947" target="blank">管理员统计</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://w05.xyz">短网址</a></p>
                
    
            </div>
        </div>
    </footer>              


<script src="https://wjl-1258252864.cos.ap-chengdu.myqcloud.com/websources/js/app.js"></script>
</body>

</html>