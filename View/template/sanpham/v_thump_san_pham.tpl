{if isset($sanpham)}
<div class="row">
    {foreach $sanpham as $sp}
        <div class="col-md-3">
            <a href="{$path_smarty}san-pham/{$sp['ten_san_pham_url']}-{$sp['ma_san_pham']}.html" class="nav-link" style="padding:0 0 1.5em 0">
                <div class="card product overlay-container">
					<div>
						<img class="card-img-top rounded" width="100%" 
					src="{$path_smarty}Public/images/hinh_san_pham/{$sp['hinh']}" alt="{$sp['ten_san_pham']}" title="{$sp['ten_san_pham']}" height="240px;" />
						<div class="overlay-product">
							<div class="text">
								<span><i>Click để xem chi tiết</i></span>
							</div>
						</div>
					
					</div>
					<div class="card-block">
						<h5 class="card-title" style="height:60px">{$sp['ten_san_pham']}</h5>
						<p class="card-text"><strong style="color:#F00">Giá: {number_format($sp['don_gia'])}<u>đ</u></strong></p>    
					</div>
					
				</div>
            </a>
        </div>
    
    {/foreach}
</div>
{/if}