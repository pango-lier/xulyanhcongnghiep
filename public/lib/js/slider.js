  jQuery(document).ready(function($){   
    if($(".btn-top").length > 0){
        $(window).scroll(function () {
            var e = $(window).scrollTop();
            if (e > 300) {
                $(".btn-top").show()
            } else {
                $(".btn-top").hide()
            }
        });
        $(".btn-top").click(function () {
            $('body,html').animate({
                scrollTop: 0
            })
        })
    }
	$('#btn-next').click(function(event){
		var slide_back=$('._active').next();
		if(slide_back.length!=0){
		$('._active').addClass('hide-left').one('webkitAnimationEnd',function(event){
			$('.hide-left').removeClass('hide-left').removeClass('_active');
		});
		slide_back.addClass('_active').addClass('go-right').one('webkitAnimationEnd',function(event){
			$('.go-right').removeClass('go-right');
			});	
		}else {
			$('._active').addClass('hide-left').one('webkitAnimationEnd',function(event){
			$('.hide-left').removeClass('hide-left').removeClass('_active');
			});
			$('.sl:first-child').addClass('_active').addClass('go-right').one('webkitAnimationEnd',function(event){
			$('.go-right').removeClass('go-right');
		});
		}
	});	
  });
  