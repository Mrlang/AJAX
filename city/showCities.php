<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charest=utf-8"/>
	<title>城市展示页面</title>
	<script type="text/javascript">
		function getXmlHttpObject(){
			var xmlHttpObject;
			if(window.ActiveXObject){
				xmlHttpObject=new ActiveXObject("Microsoft.XMLHTTP");
			}else{
				xmlHttpObject=new XMLHttpRequest();
			}
			return xmlHttpObject;
		}
		var myObject="";

		function getCities(){
			myObject = getXmlHttpObject();
			if(myObject){
				//window.alert("创建ajax引擎成功");
				var url = "/AJAX/city/showCitiesPro.php";//post
				var data = "province="+$('sheng').value;//字符串内容不能加空格
				myObject.open("post",url,true);//异步方式
				myObject.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				//指定回调函数
				myObject.onreadystatechange = chuli;
				//发送请求
				myObject.send(data);


			}else{
				window.alert("创建ajax引擎失败");
			}
		}
		function chuli(){
			//window.alert("处理函数被回调"+myObject.readyState);
			if(myObject.readyState==4){
				if(myObject.status==200){
					//取出服务器回送的数据

					window.alert(myObject.responseXML);
					var result=myObject.responseXML.getElementsByTagName("city");
					window.alert(result.length);
					$('city').length=0;
					var myoption=document.createElement("option");
					myoption.value="";
					myoption.innerText="--城市--";
					for(var i=0;i<result.length;i++){
						var city_name=result[i].childNodes[0].nodeValue;
						//创建新的元素option
						var myoption=document.createElement("option");
						myoption.value=city_name;
						myoption.innerText=city_name;
						//添加到
						$('city').appendChild(myoption);

					}
				
				/*var city_name="nanyang";
				var myoption=document.createElement("option");
				myoption.value=city_name;
				myoption.innerText=city_name;
				$('city').appendChild(myoption);*/

						
					
				}
				
			}
		}
		
		function $(id){
			return document.getElementById(id);
		}
		function Cities(){
			window.alert("asfasf");
		}

	</script>
</head>
<body>
	<select id="sheng" onchange="getCities();">
		<option value="sheng">--省--</option>
		<option value="zhejiang">浙江</option>
		<option value="jiangsu">江苏</option>
	</select>
	<select id="city">
		<option value="">--城市--</option>
	</select>
	<select id="country">
		<option value="">--县城--</option>
	</select>
		<input style="border-width:0;color:red" type="text" id="pp">
</body>
</html> 	