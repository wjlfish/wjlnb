<?php
   ini_set('session.cookie_domain', '.wjlnb.com');
   session_start();
//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['username'])){
    header("Location:reg");
    exit();
}
?>
<!DOCTYPE html>
<head>
<style>
       #bg{
            background: linear-gradient(45deg, #0099FF,#9999FF,#3300FF,#FF00FF);
            height: 100%;
        }
</style>
<link rel="stylesheet" type="text/css" href="https://study.wjlnb.com/css/index.css">
<link rel="stylesheet" type="text/css" href="https://study.wjlnb.com/css/reset.css">
<link rel="icon" href="https://study.wjlnb.com/img/favicon.ico" sizes="32x32">
<script src="https://cdn.staticfile.org/jquery/1.11.1/jquery.js"></script>
<style type="text/css">
<!--
body{ color:#000; font:12px Arial, Helvetica, sans-serif;}
#aa{ color:#000; text-decoration:none;}
#divcon{ background:#eee; padding:10px; width:150px;}
-->
</style>

        <meta charset="utf8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  		<title>课程页面——空中课堂导航</title>

                                

                                <style type="text/css">

                                body,td,th {
	font-family: Kanit, sans-serif;
	text-align: center;
}

                                </style>

        <link rel="stylesheet" href="https://study.wjlnb.com/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://study.wjlnb.com/css/bootstrap-theme.min.css">

        <link rel="stylesheet" href="https://study.wjlnb.com/css/fontAwesome.css">

        <link rel="stylesheet" href="https://study.wjlnb.com/css/light-box.css">

        <link rel="stylesheet" href="https://study.wjlnb.com/css/templatemo-style.css">



        <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800,900" rel="stylesheet">

<link rel="stylesheet" href="https://g.alicdn.com/de/prismplayer/2.8.7/skins/default/aliplayer-min.css" />
<script type="text/javascript" charset="utf-8" src="https://g.alicdn.com/de/prismplayer/2.8.7/aliplayer-min.js"></script>

        <script src="https://study.wjlnb.com/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body>
<div id="bg">

   <nav>
        <div class="logo">
   <a href="https://study.wjlnb.com">返回主页</a>
        </div>
    </nav>

    <div id="video-container">
        <div class="video-content">
            <div class="inner">
<p>3月2日答疑</p>

<div class="prism-player" id="player-con"></div>
<script>
var player = new Aliplayer({
  "id": "player-con",
  "source": "https://wjl-1258252864.cos.ap-chengdu.myqcloud.com/videos/0.mp4",
  "width": "100%",
  "height": "500px",
  "autoplay": true,
  "isLive": false,
  "rePlay": false,
  "playsinline": true,
  "preload": true,
  "controlBarVisibility": "hover",
  "useH5Prism": true
}, function (player) {
    console.log("The player is created");
  }
);
</script>

        </div>
</div>

    </div>

                  
                  
    <footer>
        <div class="container-fluid">
            <div class="col-md-12">
<p class="scroll_top">Copyright &copy;2020 wjlnb.com  版权所有&nbsp;WJLNB.COM<a href="https://tongji.baidu.com/web/10000149852/overview/index?siteId=14397947">管理员统计</a></p>
                
    
            </div>
        </div>
    </footer>


    <script src="https://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>

    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>



    <script src="js/vendor/bootstrap.min.js"></script>

    

    <script src="js/plugins.js"></script>

    <script src="js/main.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($){
        $('.scroll_top').click(function(){$('html,body').animate({scrollTop: '0px'}, 800);}); 
    });
</script>
<script type="text/javascript">
<script type="text/javascript" src="jquery-3.0.0.min.js"></script>
</div>
</body>

</html>