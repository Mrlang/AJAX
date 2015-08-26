<?php
	header("Content-Type:text/html;charest=utf-8");
	header("Cache-Control:no-cache");
	$cities=$_POST['city'];
	$res="[";
	for($i=0;$i<count($cities);$i++){
		if($i==count($cities)-1){
			$res.="{cityname:".$cities[$i].",price:".rand(500,1500)."}]";
		}else{
			$res.="{cityname:".$cities[$i].",price:".rand(500,1500)."},";
		}
	}
	echo $res;
?>