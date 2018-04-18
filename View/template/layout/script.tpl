<script src="{$path_smarty}Public/dist/js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="{$path_smarty}Public/assets/js/vendor/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{$path_smarty}Public/assets/js/ie10-viewport-bug-workaround.js"></script>

<script src="{$path_smarty}Public/assets/js/vendor/popper.min.js"></script>

<script src="{$path_smarty}Public/dist/js/jquery-1.11.2.min.js"></script>

<script src="{$path_smarty}Public/dist/js/jquery-3.2.1.min.js"></script>


<!--Về đầu trang-->
<script type="text/javascript">
	$(document).ready(function(){
      $('body').append('<div id="toTop" class="btn btn-primary" style="width:45px"><img src="{$path_smarty}Public/images/glyphicon/glyphicon-chevron-up.png" width="100%" /></div>');
    	$(window).scroll(function () {
			if ($(this).scrollTop() != 0) {
				$('#toTop').fadeIn();
			} else {
				$('#toTop').fadeOut();
			}
		}); 
    $('#toTop').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
	});
</script>
<!--end-->

<script type="text/javascript">
	$(document).ready(function(){
    $("#btnMua").click(function(){
			
	   		var sl=$("#txtSoLuong").val();
			if(sl<=0)
			{
				alert('Số lượng không hợp lệ');
				return;
			}
			var id=$(this).attr('name');
			<!--end ajax-->
			$.ajax({
		        	url: "{$path_smarty}khach-hang/them-san-pham.html", 
		        	dataType: "text",
		        	type: "POST",
		        	data: { ma_san_pham : id , so_luong : sl },

		        	success: function(result)
		        	{
						if(result == 1)
						{
							alert("Thêm vào giỏ hàng không thành công");	
						}
						else
						{
							alert("Đã thêm thành công vào giỏ hàng của bạn");		
						}
		        	}
		    	});
			<!--end ajax-->
    	});
	});
</script>

