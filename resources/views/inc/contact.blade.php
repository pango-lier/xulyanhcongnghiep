

<div id="contact_us" class="container">

	<h1 class="titleCenter fontSize-36">{{$_contact??''}}</h1>

	<div class="desc text-center">

	<p>{{$_contact_description??''}}</p>

	</div>

	<div class="clr" style="margin-bottom: 25px;"></div>

  <div class="row">

    <div class="col-sm-12" >

    	<div class="col-sm-6">

    		<form action="postmail" class="contact-form" method="post">

    			@csrf

		        <div class="form-group">

		          <input type="text" class="form-control"  name="name" placeholder="Họ Tên" required="">

		        </div>

		        <div class="form-group form_left">

		          <input type="email" class="form-control"  name="email" placeholder="Email" required="">

		        </div>

		      <div class="form-group">

		           <input type="text" class="form-control" name="phone"  maxlength="10" placeholder="Số điện thoại" required="">

		      </div>

		      <div class="form-group">

		      <textarea class="form-control textarea-contact" rows="5" id="messsage" name="message" placeholder="Nội dung tin nhắn" required=""></textarea>

		      <br>

	      	  <input class="btn btn-default btn-send" type="submit" name="submit" value="Gửi tin nhắn">

	      	  {{--<button class="btn btn-default btn-send"> <span class="glyphicon glyphicon-send"></span> Gửi tin nhắn </button>--}}

		      </div>

     		</form>

    	</div>

    	<div class="col-sm-6">

    	<iframe src="{{$_contact_google_link??''}}" width="99%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

    	</div>

    </div>

  </div>



</div>
