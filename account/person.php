<?php
$urls = array(
    'https://www.wjlnb.com/account/person',
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

session_name('wjlnb_id');
session_start();
if(!isset($_SESSION['userid'])){
	header("Location:login");
	exit();
}

$picsrc = $_SESSION['picsrc'];	
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
$regtime = $_SESSION['regtime'];
$rltime = date("Y-m-d H:i:s", $regtime);
$email = $_SESSION['email'];
function OutputTitle(){
    echo '。。。出错了';
}
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
<title>账户——空中课堂导航</title>
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
</head>

<body>


<nav>
        <div class="logo">
   <a href="/">导航</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "<a href='https://www.wjlnb.com/account/'>{$_SESSION['username']}</a>"; ?>
 </div>
 <button type="button" style="background-color:white;color:black;" id="tp-weather-widget"> </button>
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
		<image xlink:href="https://www.wjlnb.com/api/bingimg.php" x="0" y="0" width="2880" height="1620" filter="url(#blurMe)" />
	</svg>

	<div class="content" content-margin="5px">
<div class="inner">
<p><?php 
echo"<img src='".$picsrc."'><br>";
echo '个人信息<br />';
echo '<a id="time"></a><br />';
echo '<a id="bjtime"></a><br />';
echo '---------------------------------<br />';
echo '您是本网站第',$userid,'个注册的人<br />';
echo '您的用户名是：<br />';
echo '',$username,'<br />';
/*echo '您的注册邮箱是：<br />';
echo '',$email,'<br />';
echo '您的注册时间是：<br />';
echo '',$rltime,'<br />';
echo '会员有效期至：<br />';
echo '2020-12-31 24:00:00<br />';*/
if($_SESSION['username'] == "adminwjl")
	echo '用户组：<a href="admin">超级管理员</a>';
else
 echo '用户组：普通用户';
echo '<br />';
echo '<a href="logindo.php?action=logout">注销</a><br />';
echo '<a href="https://www.wjlnb.com">前往主页</a><br />';
?>
          </div>

        </div>

    </div>               

		</div>
		
	</div>
	
</div>
         


<script src="https://wjl-1258252864.cos.ap-chengdu.myqcloud.com/websources/js/app.js"></script>
</body>

</html>

            </div>
        </div>
    </div>
                  
    <footer>
        <div class="container-fluid">
            <div class="col-md-12">
                <p>COPYRIGHT © 2020 <a href="https://www.wjlnb.com">wjlnb.com</a> <a href="admin">管理系统</a></p>
    
            </div>
        </div>
    </footer>

 </html>
