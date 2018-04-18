{extends file="layout/master.tpl"}
{block name='title'}Đăng ký thông tin của bạn - DTGear Shop - Shop Gaming Gear HCM{/block} 
{block name='content'}

<div class="contact-form">
<div class="container">
    <div class="row">
    <div class="col-md-12" style="margin:25px">
        		<h1 align="center" class="text-info">THÔNG TIN KHÁCH HÀNG</h1>
              </div>
        <div class="col-md-12">
        	{if isset($data['mss'])}
			<p style="color: #ff0000">{$data['mss']}</p>
		{/if}

		{if !isset($smarty.session.nguoi_dung)}
		<div class="row">
			<div class="col-md-12">
			<form method="post">
				  <div class="form-group">
				    <strong><label for="email" style="color: #000000">Tên khách hàng</label></strong>
				    <input type="text" class="form-control" id="ten_khach_hang" name="ten_khach_hang" value="{$data['ten_khach_hang']}">
				    <span style="color: #ff0000">{$dataErr['ten_khach_hang']}</span>
				  </div>
				   <div class="form-group">
				    <strong><label for="email" style="color: #000000; margin-right: 20px">Phái</label></strong>
				    <label style="color: #000000; margin-right: 20px"><input type="radio" name="phai" value="1" {if $data['phai']==1}checked="checked"{/if}> Nam</label>
				    <label style="color: #000000; margin-right: 20px"><input type="radio" name="phai" value="0" {if $data['phai']==0}checked="checked"{/if}> Nữ</label>
				  </div>
				   <div class="form-group">
				    <strong><label for="email" style="color: #000000">Email:</label></strong>
				    <input type="email" class="form-control" id="email" name="email" value="{$data['email']}">
				    <span style="color: #ff0000">{$dataErr['email']}</span>
				  </div>
				  <div class="form-group">
				    <strong><label for="ngay_sinh" style="color: #000000">Ngày sinh</label></strong>
				    <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh" value="{$data['ngay_sinh']}">
				    <span style="color: #ff0000">{$dataErr['ngay_sinh']}</span>
				  </div>
				   <div class="form-group">
				    <strong><label for="email" style="color: #000000">Địa chỉ</label></strong>
				    <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="{$data['dia_chi']}">
				    <span style="color: #ff0000">{$dataErr['dia_chi']}</span>
				  </div>
				   <div class="form-group">
				    <strong><label for="email" style="color: #000000">Điện thoại:</label></strong>
				    <input type="text" class="form-control" id="dien_thoai" name="dien_thoai" value="{$data['dien_thoai']}">
				    <span style="color: #ff0000">{$dataErr['dien_thoai']}</span>
				  </div>
				 			 	
				  <div align="center">			  
					  <button type="submit" name="dangky" class="btn btn-primary btn-lg" required="required">Đặt hàng</button>
				  </div>
			</form>
			</div>
		</div>
		{else}
		<div class="row">
			<div class="col-md-12">
			<form method="post">
				  <div class="form-group">
				    <strong><label for="email" style="color: #000000">Tên khách hàng</label></strong>
				    <input type="text" class="form-control" id="ten_khach_hang" name="ten_khach_hang" value="{$ten_khach_hang}" disabled="disabled">
				  </div>
				   <div class="form-group">
				    <strong><label for="email" style="color: #000000; margin-right: 20px">Phái</label></strong>
				    <label style="color: #000000; margin-right: 20px"><input type="radio" name="phai" value="1" {if $phai==1}checked="checked"{/if}> Nam</label>
				    <label style="color: #000000; margin-right: 20px"><input type="radio" name="phai" value="0" {if $phai==0}checked="checked"{/if}> Nữ</label>
				  </div>
				   <div class="form-group">
				    <strong><label for="email" style="color: #000000">Email:</label></strong>
				    <input type="email" class="form-control" id="email" name="email" value="{$email}" disabled="disabled">
				  </div>
				  <div class="form-group">
				    <strong><label for="ngay_sinh" style="color: #000000">Ngày sinh</label></strong>
				    <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh" value="{$ngay_sinh}">
				  </div>
				   <div class="form-group">
				    <strong><label for="email" style="color: #000000">Địa chỉ</label></strong>
				    <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="{$dia_chi}">
				  </div>
				   <div class="form-group">
				    <strong><label for="email" style="color: #000000">Điện thoại:</label></strong>
				    <input type="text" class="form-control" id="dien_thoai" name="dien_thoai" value="{$sdt}">
				  </div>
				 			 	
				  <div align="center">			  
					  <button type="submit" name="dangky" class="btn btn-primary btn-lg" required="required">Đặt hàng</button>
				  </div>
			</form>
			</div>
		</div>	
		{/if}	
	</div>
        
        </div>
    </div>
</div>


		
{/block}
<!--`ten_khach_hang`, `phai`, `email`, `dia_chi`, `dien_thoai`, `ghi_chu`, `ten_dang_nhap`, `mat_khau`-->