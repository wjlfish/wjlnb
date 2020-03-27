/*这是本站的一个api接口，外部可以通过https://www.wjlnb.com/api/bingimg请求调用
api内容：bing主页每日一图，使用其原生api中的信息，获取图片地址，目前被用于网站主页的背景图*/
<?php
$date = mt_rand(0, 7); //7天图片
$json_content = file_get_contents('https://cn.bing.com/HPImageArchive.aspx?format=js&idx=' . $date . '&n=1&mkt=zh-CN'); //读取必应api，获得相应数据
$json_content = json_decode($json_content, true);
$imgurl = 'https://cn.bing.com' . $json_content['images'][0]['url']; //组合成品
header("Location: $imgurl");
?>
