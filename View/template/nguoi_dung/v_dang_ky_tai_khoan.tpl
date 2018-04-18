{extends file='layout/master.tpl'}
{block name='title'}Đăng ký tài khoản của bạn - DTGear Shop - Shop Gaming Gear HCM{/block} 
{block name='keywords'}Bai viet cong nghe cua dtgearshop{/block}
{block name='content'}
	<div class="container">
        <form class="form-horizontal" role="form" method="POST" action="">
            <div class="row" style="padding-top:3em">
                <div class="col-md-3 col-sm-3"></div>
                <div class="col-md-6 col-sm-6">
                    <h2 align="center" style="padding-bottom:1em">Đăng ký tài khoản của bạn</h2>
                    <hr>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3 col-sm-3"></div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <h5>Tên đăng nhập
                        	<span class="text-danger align-middle">
                        	{$dataErr['ho_ten']}   
                        	</span>
                        </h5>
                        
                        <div class="">
                        	<input class="form-control" id="ten_dn" name="ten_dn" type="text" value="{$data['ten_dang_nhap']}" placeholder="Tên đăng nhập..."/>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-3"></div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <h5>Mật khẩu
                        	<span class="text-danger align-middle">
                        		{$dataErr['mat_khau']}   
                        	</span>
                        </h5>
                        <div class="">
                            <input type="password" class="form-control" placeholder="Mật khẩu..." id="mat_khau" name="mat_khau" >
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3 col-sm-3"></div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <h5>Họ tên
                        	<span class="text-danger align-middle">
                        		{$dataErr['ho_ten']}   
                        	</span>
                        </h5>
                        <div class="">
                            <input type="text" class="form-control" placeholder="Họ tên..." id="ho_ten" name="ho_ten" value="{$data['ho_ten']}" >
                        </div>
                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3 col-sm-3"></div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <h5>Địa chỉ email
                        	<span class="text-danger align-middle">
                        		{$dataErr['ho_ten']}   
                        	</span>
                        </h5>
                        <div class="">
                            <input type="email" class="form-control" placeholder="example@gmail.com" id="email" name="email" value="{$data['email']}" >
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3 col-sm-3"></div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <h5>Số điện thoại
                        	<span class="text-danger align-middle">
                        		{$dataErr['dien_thoai']}    
                        	</span>
                        </h5>
                        <div class="">
                            <input type="number" class="form-control" placeholder="Điện thoại..." id="dien_thoai" name="dien_thoai" value="{$data['dien_thoai']}" >
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                
                </div>
            </div>
            
             <div class="row">
               
                <div align="center" class="col-md-12 col-sm-12">
                	<i>
                    	<span class="text-danger align-middle">
                        	(*) trường này bắt buộc phải điền đầy đủ.   
                    	</span>
                    </i>
                </div>
               
            </div>
            
        	<hr />
            
            <div class="row">
                <div class="col-md-3"></div>
                <div align="center" class="col-md-6" style="padding-bottom:3em">
                	{if isset($dataErr['err'])}
                        <p class="login-box-msg text-danger">{$dataErr['err']}</p>
                    {/if}
                	
                    <a class="btn btn-link" href="{$path_smarty}dang-nhap.html">Bạn đã có tài khoản?</a><br>
					
                    <button type="submit" class="btn btn-success" name="btnDangKy">Đăng ký</button>
                     
                </div>
            </div>
            
        </form>
    </div>
{/block}