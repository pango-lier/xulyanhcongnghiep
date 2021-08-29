<style type="text/css">
	.email_cmt{
    font-size:14px;
    font-weight: bold;
    padding-left: 20px;
}
.comments-item{
  padding: 10px 0px;
}
.comments-item .media{
    border-bottom: 1px dotted #ccc;
}
.media-body{
padding-left: 60px;
}
.comments-form{
  margin-top: 40px;
  margin-bottom: 20px;
}
</style>
<style>
.loader {
  margin: 5px auto;
  border: 4px solid #f3f3f3;
  border-radius: 50%;
  border-top: 4px solid #3498db;
  width: 20px;
  height: 20px;
  -webkit-animation: spin 1s linear infinite; /* Safari */
  animation: spin 1s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<div class="comments-form">
		<h4 style="color: blue;font-weight: bold;">Tham gia bình luận</h4>
		<form action="javascript:void(0)" id="comments-form" method="POST">
			@csrf
      <input type="hidden" id="post_id" name="post_id" value="{{$id}}">
      <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Nhập tên" />
        <div id="error-name"></div>
      </div>  
			<div class="form-group">
				<input type="text" class="form-control" name="email" placeholder="Nhập email" />
        <div id="error-email"></div>
			</div>	
			<div class="form-group">
			<textarea style="width: 100%;padding: 15px" name="content"  rows="5" placeholder="Nhập bình luận"></textarea>
      <div id="error-content"></div>
			</div>	
			<input id="send_cmt" type="submit" value=" Bình Luận">
		</form>
	<div class="clearfix"></div>
  <div id="ami-loader"></div>   	
  <div id="outner_comment"></div>
    
</div>
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
  var post_id= {{$id}};
	$(document).ready(function(){
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
      list_comment(post_id);
		$('#send_cmt').click(function(e){
			e.preventDefault();
      $("#ami-loader").addClass('loader');
			var str = $("#comments-form").serialize();
			$.ajax({
                type: 'POST',
                url: 'cmt/store',
                data:str,
                success: function (data) {
                      $('#error-content').html('');
                      $('#error-email').html('');
                    if (data.status.code == 200) {
                       $('textarea[name="content"]').val('');
                      var comments=html_comment(data);
                      $("#outner_comment").prepend(comments);
                    }
                    if (data.status.code == 404) {
                      if(data.status.error['email']!=undefined && data.status.error['email']!=null)$('#error-email').html('<div class="alert alert-danger">'+data.status.error['email'][0]+'<div>');
                      if(data.status.error['content']!=undefined && data.status.error['content']!=null)$('#error-content').html('<div class="alert alert-danger">'+data.status.error['content'][0]+'<div>');
                    }
                    $("#ami-loader").removeClass('loader'); 
                },
                error: function () {
                  $('#error-content').html('');
                  $("#ami-loader").removeClass('loader'); 
                }
            });
		});
	});

  function list_comment(post_id)
  {
    var comments = "";
    var list = "";
    $("#ami-loader").addClass('loader');
    $.ajax({
                type: 'POST',
                url: 'cmt/index',
                data:{post_id: post_id},//$('input[name="post_id"]').val()},
                success: function (data) {
                  //console.log(data);
                      $("#outner_comment").html('');
                      data.forEach(function(comment){
                        comments=html_comment(comment);
                        $("#outner_comment").append(comments);
                      });
                    $("#ami-loader").removeClass('loader'); 
                },
                error:function(){
                  $("#ami-loader").removeClass('loader'); 
                }
            });
  }
  function html_comment(comment)
  {
    var html_cmt='<div style="clear:both;"></div>'+
                           '<div class="comments-item ">'+
                               '<div class="media">'+
                                    '<div class="img_cmt" >'+
                                      '<img style="float: left;width:40px;height:40px" src="/storage/images/user.png">'+
                                        '<h4 style="float: left;max-width:400px;" class="email_cmt">'+comment['name']+'</h4>'+
                                      '<p class="time_ago_cmt" style="float: right;width: 120px;text-align: right;"><small>'+comment['time_ago']+
                                      '</small></p>'+
                                    '</div>'+
                                     '<div style="clear: both;"></div>'+
                                    '<div class="media-body">'+ 
                                     
                                     
                                      '<p style="word-wrap: break-word;">'+comment['content']+'</p>'+
                                      '<p><small><a href="">Like</a> - <a href="">Share</a></small></p>'+
                                    '</div>'+
                                  '</div>'+
                          '</div>';
    return html_cmt;                      
  }
</script>