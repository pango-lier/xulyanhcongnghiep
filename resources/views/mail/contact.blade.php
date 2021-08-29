<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width,&#32;initial-scale=1.0" />
	<title>Contact information</title>
</head>
<style type="text/css">
	body{
		width: 90%;
		margin: auto;
		max-width: 800px;
	}
</style>
<body>	<h3>Contact information xulyanhcongnghiep.com,</h3>
		<p style="font-weight: bold;">
		 Sent from : sales@vstech.com.vn<br>
		 Name : {{$mail['name']}}<br>
		 Email : {{$mail['email']}}<br>
		 Phone : {{$mail['phone']}} </p>
		<p>Messages</p>
		<p style="font-style: italic;">{{$mail['message']}}</p>
		<p></p>
		<p>Thanks & Best Regards,<br><span>** Please note: Do not reply to this email.<br>Contact all at email : sales@vstech.com.vn </span><br>
		** Vui lòng không trả lời lại email này. <br>Mọi thông tin liên lạc qua email : sales@vstech.com.vn
		</p>
		
</body>
</html>