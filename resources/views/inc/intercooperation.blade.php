						
<div class="interCooperation">
							<div class="container">
								<h1 class="titleCenter fontSize-36">Đối tác và khách hàng</h1>
								<div class="desc text-center">
									<p>VSTech đã cung cấp sản phẩm và giải pháp công nghệ cho nhiều khách hàng lớn.</p>
								</div>
								<div class="interCate">
									@foreach($intercooperations as $row)
									<div class="item"><a href="#"><img class="lazy" data-original="{{$row->img_path}}?w=170&amp;amp;h=130&amp;amp;" /></a></div>
									@endforeach
								</div>
								<div class="clr"></div>
								
							</div>
						</div>