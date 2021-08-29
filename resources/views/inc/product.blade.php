<div id="products">
	<style type="text/css">
.image-zoom {
width:99%; 
}
.image-zoom:hover {
    -ms-transform: scale(1.3);
    transform: scale(1.1);
    transition: filter .6s,opacity .6s,transform .6s,box-shadow .3s;
overflow: hidden;
}
.card_img{
	box-sizing: border-box;
	width: 90%;
	overflow:hidden;
}
.mycard{
	padding: 10px 8px 20px 8px;
 		box-shadow: 2px 2px 2px 4px rgba(0, 0, 0, 0.15);	
		border-radius: 5px;
		max-width: 300px;
		height: 420px;
		margin: 20px auto;
		position: relative;
}
.mycard-title{
	text-align: center;
	font-weight:bold; 
	color: blue;
}
.mycard-title:hover{
	color: green;
	cursor: pointer;
	}
.mycard-text{
	text-align: justify;
	height: 110px;
	overflow: hidden;
	padding-right: 10px;
	padding-left: 10px;
}
.mycard-body{

}
.mycard-btn {
 position: absolute;
 bottom: 5px;
 left: 20px;	
}
#products .readmore{
	margin-top: 30px;
	}
	</style>
								<div class="row">
						<?php
						foreach ($products as $key=> $row) {
						?>
						<div class="col-sm-6 col-md-3 mycard wow @if($key%2==0)fadeInRight @else fadeInLeft @endif">
						  <div class="card_img" >
						  	<a href="{{$row->slug.'+'.$row->id.'/product.html'}}">
						  <img class="image-zoom" src="<?php echo $row->img_path ?>" alt="<?php echo $row->slug ?>" title='<?php echo $row->name ?>'/>
						  </a>
						  </div>
						  <div class="mycard-body">
						      <a href="{{$row->slug.'+'.$row->id.'/product.html'}}">
						    <h5 class="mycard-title"><?php echo $row->name ?></h5></a>
						    <p class="mycard-text"><?php echo $row->description ?></p>
						    <div class=" mycard-btn">
						    <a href="{{$row->slug.'+'.$row->id.'/product.html'}}" class="btn btn-primary col-6">Chi tiết</a>
						    <button type="button"  onclick="sendAjax('cart/add','add=1&id={{$row->id}}',this)" class="btn btn-danger col-6 add-to-cart" value=""><i class="fa fa-cart-plus"></i> Chọn mua</button>
						   
						</div>
						  </div>
						</div>
						<?php } ?>
						<div class="clr" id="txtxtx"></div>
						<div style="text-align: center;">{{$products->links()}}</div>
						</div>
							</div>
<script type="text/javascript">
function sendAjax(href,data,this_node) {
this_node.setAttribute("disabled","");
var arClass=[...document.getElementsByClassName('add-to-cart')];//chuyen doi colllerction thanh array
//arClass.forEach(function(item){
 //item.setAttribute("disabled","");
//});
	
data=data+'&_token='+"{{ csrf_token() }}" ;
var xhttp;
xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
	//this_node.removeAttribute('disabled');
if (this.readyState == 4 && this.status == 200) {
this_node.removeAttribute('disabled');	
  var data=JSON.parse(this.responseText);
 document.getElementById('cart-count').innerHTML=data.count;
 //arClass.forEach(function(item){
 //item.removeAttribute("disabled");
//});
}

};
xhttp.open("POST",href, true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send(data);   
}								

							</script>	
							
							
