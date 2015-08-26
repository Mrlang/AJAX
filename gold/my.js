function getMyObject(){
	var myObject;
	if(window.ActiveXobject){
		myObject=new ActiveXobject("Microsoft.XMLHTTP");
	}else{
		myObject=new XMLHttpRequest();
	}
	return myObject;
}
function $(id){
	return document.getElementById(id);
}