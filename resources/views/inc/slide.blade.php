<style type="text/css">
	.swiper-slide .head_slider{
		width: 100%;
		height: 65px;
		position: absolute;
		top:0% ;
		color: white;
		background-color: black;
		opacity: 0.5;
		width: 100%;
	}
		.swiper-slide h2{
	position: absolute;
	width: 100%;		
	font-size: 24px;
	top:0px ;
	color: white;
	text-align: center;
}
@media screen and (max-width:991.98px) {
	.swiper-slide h2{
	font-size: 20px;
}
@media screen and (max-width:767.98px) {
	.swiper-slide h2{
	font-size: 16px;
}
}
</style>
<div class="slideBannerDe">
							<!-- Slider main container -->
							<div class="swiper-container">
								<!-- Additional required wrapper -->
								<div class="swiper-wrapper">
									<!-- Slides -->
									@foreach($sliders as $row)
									<div class="swiper-slide"><a href="{{$row->post->slug.'+'.$row->post->id.'.html'}}" >
										<div class="">
										</div>
										<h2 ></h2>
										<img class="lazy" src="{{$row->img_path}}"
										alt='{{$row->post->name}}' /></a>

									</div>
									@endforeach
								</div>
								<div class="swiper-button-prev swiper-button-white"></div>
								<div class="swiper-button-next swiper-button-white"></div>
							</div>
						</div>