<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charest=utf-8">
	<link rel="stylesheet" type="text/css" href="Untitled-1.css">
	<title>黄金价格</title>
	<script src="my.js" type="text/javascript"></script>
	<script type="text/javascript">
		var myObject;
		function updateGoldPrice(){
			myObject=getMyObject();
			if(myObject){
				//创建ajax引擎成功
				url="/AJAX/gold/goldPriceProcess.php";
				data="city[]=ld&city[]=tw&city[]=dj";
				myObject.open("post",url,true);
				myObject.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				myObject.onreadystatechange=function chuli(){
					//接收数据
					if(myObject.readyState==4){
						if(myObject.status==200){
							//取出数据并转成对象数组
							//window.alert(myObject.responseText);
							var res_object=eval("("+myObject.responseText+")");
							
							$('ld').innerText=res_object[0].price;
							$('tw').innerText=res_object[1].price;
							$('dj').innerText=res_object[2].price;
						}
					}
				}
				myObject.send(data);
			}
		}
		//使用定时器 每隔5秒发送
		window.setInterval("updateGoldPrice()",2500);
	</script>
</head>
<body>
	<center>
		<h1>每隔5秒中更新数据（以1000为基数计算涨跌）</h1>
		<table border="0" class="abc">
			<tr><td colspan="3">fffff</td></tr>
			<tr><td>市场</td><td>最新价格</td><td>涨跌</td></tr>
			<tr><td>伦敦</td><td id="ld">788.7</td><td>+211.3</td></tr>
			<tr><td>台湾</td><td id="tw">788.7</td><td>-211.3</td></tr>
			<tr><td>东京</td><td id="dj">788.7</td><td>-211.3</td></tr>
		</table>
	</center>
</body>
</html>