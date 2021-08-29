<div class="weAre">
							<div class="wrapWeAre">
								<div class="wrap-title"><span class="title-weare">Tôi là</span></div>
								<div class="select-one select-wrap">
									<span class="select-label"></span>
									<ul id="linkRefer" class="select-menu">
										<li data-id="128" class="active">Người tìm việc</li>
										<li data-id="127" class="">Cổ đông</li>
										<li data-id="123" class="">Đối tác</li>
										<li data-id="122" class="">Khách hàng</li>
									</ul>
								</div>
								<div class="wrap-title"><span class="title-wewant">Tôi muốn</span></div>
								<div class="select-two select-wrap">
									<span class="select-label"></span>
									<ul id="linkReferDetail" class="select-menu">
										<li data-url="http://hpt.vn/lien-he" parentId="128" class="active">Gửi yêu cầu</li>
										<li data-url="http://www.hpt.vn/lien-he" parentId="127" class="">Gửi yêu cầu</li>
										<li data-url="http://www.hpt.vn/lien-he" parentId="123" class="">Gửi yêu cầu</li>
										<li data-url="http://www.hpt.vn/lien-he" parentId="122" class="">Gửi yêu cầu</li>
										<li data-url="http://www.hpt.vn/recruitment" parentId="128" class="">Xem Thông tin Tuyển dụng</li>
										<li data-url="http://www.hpt.vn/co-dong" parentId="127" class="">Xem Thông tin Quan hệ cổ đông</li>
										<li data-url="http://www.hpt.vn/dich-vu" parentId="122" class="">Tham khảo Dịch vụ</li>
										<li data-url="http://www.hpt.vn/giai-phap-cong-nghe" parentId="122" class="">Tham khảo Giải pháp công nghệ</li>
										<li data-url="http://www.hpt.vn/doi-tac" parentId="123" class="">Hợp tác</li>
									</ul>
								</div>
								<script>$(document).ready(function () {
									$('#btnSelect').on('click',
									    function() {
									        var url = $('#linkReferDetail li[class="active"]').data('url');
									        location.href = url;
									    });
									$('#linkRefer li').on('click',
									    function() {
									        var id = $(this).data('id');
									        $('#linkReferDetail li').hide();
									        var childs = $('#linkReferDetail li[parentId="' + id + '"]');
									        childs.show();
									        childs[0].click();
									    });
									setTimeout(function() {
									        var firstParent = $('#linkRefer li').eq(0);
									        if (firstParent) {
									            firstParent.click();
									        }
									    },
									    500);
									
									})
								</script>
								<div class="btnWeAre"><a id="btnSelect">Chọn</a></div>
							</div>
						</div>