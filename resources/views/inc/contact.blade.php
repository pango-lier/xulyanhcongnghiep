
<div id="contact_us" class="container">
	<h1 class="titleCenter fontSize-36">Liên hệ</h1>
	<div class="desc text-center">
	<p>Hãy liên hệ với chúng tôi để được tư vấn tận tình hơn !</p>
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
    	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1385.5249490252586!2d106.80615834338423!3d10.822303452076154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317526d7440cf865%3A0x28a42b1a2c692dc0!2zMTQzLCAyNiBWw7UgVsSDbiBIw6F0LCBMb25nIFRyxrDhu51uZywgUXXhuq1uIDksIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1603034979012!5m2!1svi!2s" width="99%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    	</div>
    </div>
  </div>

</div>