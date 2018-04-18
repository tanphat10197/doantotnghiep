<div class="container header">
    <div class="row">
        <div class="col-md-4 col-sm-4 logo">
            <a href="{$path_smarty}">
                <img src="{$path_smarty}Public/images/banner/logo_01.png" width="100%"/>
            </a>
        </div>
        
        <div class="col-md-4 col-sm-4">
            <form class="form-inline" action="{$path_smarty}san-pham/tim-kiem-san-pham.html" method="post">
                <div class="form-group mx-sm-1 mb-2">
                	<input type="text" class="form-control" id="txtsearch" name="txtsearch" placeholder="Nhập từ khóa muốn tìm...">
                </div>
            	<button type="submit" class="btn btn-danger mb-2" name="btnsearch">Tìm</button>
            </form>
        </div>    
        
        <div class="col-md-1 col-sm-1 cart">
            <a href="{$path_smarty}khach-hang/gio-hang.html"> 
                <img src="{$path_smarty}public/images/banner/icon-cart.png" alt="Giỏ hàng" title="Giỏ hàng" width="26px"/>
                <p style="font-size:19px" class="text-hover">
                    {if !isset($so_luong) || $so_luong == 0}
                        &nbsp;
                    {else}
                        ({$so_luong})
                    {/if}
                </p>
            </a>
        </div>

        {if !isset($smarty.session.nguoi_dung)}
        <div class="col-md-3 col-sm-3 cart"> 
        	<div class="row">
            	<div class="col-md-7 col-sm-7">
                    <a href="{$path_smarty}dang-nhap.html">
                        <img src="{$path_smarty}Public/images/banner/login.gif" width="25px" style="margin-left:10px"/>
                        <p style="font-size:15px; padding-left:2px" class="text-hover">Đăng nhập</p>
                    </a>
            	</div>
                <div class="col-md-5 col-sm-7">
                    <a href="{$path_smarty}dang-ky-tai-khoan.html">
                        <img src="{$path_smarty}Public/images/banner/login.gif" width="25px" style="margin-left:10px"/>
                        <p style="font-size:14px; padding-left:2px" class="text-hover">Đăng ký</p>
                    </a>
            	</div>
            </div>
        </div>

        {else}
        <div class="col-md-2 col-sm-2 cart">    
                <img src="{$path_smarty}Public/images/banner/user.png" alt="{$smarty.session.ten}" title="{$smarty.session.ten}" width="23px"/>
                <p style="font-size:15px;">{$ten}</p>
                
        </div>
        
        <div class="col-md-1 col-sm-1 cart"> 
            <a href="{$path_smarty}dang_xuat.php">
                <img src="{$path_smarty}Public/images/banner/logout.gif" width="20px" alt="Đăng xuất" title="Đăng xuất"/>
            </a>  
        </div>
        
        
        {/if}
    </div>  

</div>
