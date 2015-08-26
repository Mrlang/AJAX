<?php
	header("Content-Type:text/xml;charest=utf-8");
	header("Cache-Control:no-cache");/*告诉浏览器不要缓存数据*/
	//接收用户选择省的名字
	$province=$_POST['province'];
	$a="saf";
	$info="";
	file_put_contents('e:/Wamp/www/AJAX/city/mylog.log', $province."----".$a."\r\n",FILE_APPEND);
	if($province=="zhejiang"){
		$info="<province><city>杭州</city><city>温州</city><city>宁波</city></province>";
	}else if($province=="jiangsu"){
		$info="<province><city>南京</city><city>徐州</city><city>苏州</city></province>";
	}
	echo $info;

?>