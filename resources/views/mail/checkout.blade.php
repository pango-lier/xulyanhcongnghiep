<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width,&#32;initial-scale=1.0" />
	<title>Order processing</title>
</head>
<style type="text/css">
	body{
		width: 90%;
		margin: auto;
		max-width: 800px;
	}
table {
  border-collapse: collapse;
  width: 100%;
}

th {
  height: 30px;
}
</style>
<body>	<h3>Order processing by </h3>

		<p style="font-weight: bold;">
		 Sent from : sales@vstech.com.vn<br>
		 Name : {{$customer->name}}<br>
		 Email : {{$customer->email}}<br>
		 Address : {{$customer->address}} <br>
		 Phone : {{$customer->phone}} </p>
		<h2>Bill Total :  {{number_format($bill->total) }}$</h2>
		<p >Note : </p><span style="font-style: italic;">{{$bill->note}}</span>
		<h3>Bill detail</h3>
		<div>
			<table style="text-align: center;">
				<tr>
					<th>STT</th>
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total</th>
				</tr>
				<?php $stt=0;?>
				@foreach($cartInfor as $row)
				<tr>
					<td><?php echo $stt++;?></td>
					<td>{{$row->name}}</td>
					<td>{{number_format($row->price)}}$</td>
					<td>{{$row->qty}}</td>
					<td>{{number_format($row->qty*$row->price)}}$</td>
				</tr>
				@endforeach
			</table>
		</div>
		<p>Thanks & Best Regards,<br><span>** Please note: Do not reply to this email.<br>Contact all at email : sales@vstech.com.vn </span><br>
		** Vui lòng không trả lời lại email này. <br>Mọi thông tin liên lạc qua email : sales@vstech.com.vn
		</p>

</body>
</html>
