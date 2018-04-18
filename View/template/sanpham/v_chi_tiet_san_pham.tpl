{extends file='layout/master.tpl'}
{block name='title'}{$san_pham['ten_san_pham']} - DTGear Shop - Shop Gaming Gear HCM{/block} 
{block name='keywords'}Shop gaming gear noi tieng nhat ho chi minh{/block}
{block name='content'}
	<div class="container">
		<div class="row">
      		<div class="col-md-12">
                <strong>
                    <h2 class="bg-header-product">{$san_pham['ten_san_pham']}</h2>
                </strong>
            </div>
		</div>
	</div>
    
    <br />

    
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img class="rounded" src="{$path_smarty}Public/images/hinh_san_pham/{$san_pham['hinh']}" 
						width="100%" id="zoom"/>
			</div>

			<div class="col-md-6">
				<h5>{$san_pham['ten_san_pham']}</h5>
				<p>Số lượt xem : {$san_pham['so_lan_xem']}</p>
				<strong><p style="font-size: 30px" class="text-danger">Giá: {number_format($san_pham['don_gia'])}
					<sup style="font-style: italic; text-decoration: underline;">đ</sup></p></strong> 

				<hr/>
				<p> {$san_pham['mo_ta_chi_tiet']} </p>
				<div class="form-inline">
                	<input type="number" value="1" name="txtSoLuong" id="txtSoLuong"
                     class="form-control" style="width:90px; text-align:center; margin-right:10px" min="1" max="10"/>
                     <button class="btn btn-primary" id="btnMua" name="{$san_pham['ma_san_pham']}">Thêm vào giỏ hàng</button>
                </div>
			</div>
		</div>
	</div>
	<br />

	<div class="container">
    	<div class="row">
        	<div class="col-md-12" style="">
            	<div class="bg-header">	
            		<h4 class="bg-danger text-white" style="padding:10px; width:320px"><i>SẢN PHẨM THEO LOẠI</i></h4>
                </div>
            </div>
        </div>
		
        <br />
        {include file='sanpham/v_thump_san_pham.tpl'}
	</div>
{/block}
