function sendAjax(href,data,this_node) {
this_node.setAttribute("disabled","");	
//data=data+'&_token='+"{{ csrf_token() }}" ;
var xhttp;
xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
	this_node.removeAttribute('disabled');
if (this.readyState == 4 && this.status == 200) {
  
}
};
xhttp.open("POST",href, true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send(data);   
}								
