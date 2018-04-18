{extends file='layout/master.tpl'}
{block name='title'}Đăng nhập vào tài khoản của bạn - DTGear Shop - Shop Gaming Gear HCM{/block} 
{block name='keywords'}Bai viet cong nghe cua dtgearshop{/block}
{block name='content'}
	<div class="container">
        <form class="form-horizontal" role="form" method="POST" action="">
            <div class="row" style="padding-top:3em">
                <div class="col-md-3 col-sm-3"></div>
                <div class="col-md-6 col-sm-6">
                    <h2 align="center" style="padding-bottom:1em">Đăng nhập vào tài khoản của bạn</h2>
                    <hr>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3 col-sm-3"></div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <h5>Tên đăng nhập</h5>
                        <div class="">
                            <input type="text" class="form-control" placeholder="Tên đăng nhập..." name="ten_dn" 
                        value="{if isset($smarty.post.ten_dn)}{$smarty.post.ten_dn}{/if}">
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
                        <h5>Mật khẩu</h5>
                        <div class="">
                            <input type="password" class="form-control" placeholder="Mật khẩu..." name="mat_khau">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                        <!-- Put password error message here form-check-input -->    
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-3"></div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" {if isset($smarty.post.chkGhiNho)} checked="checked" {/if} name="chkGhiNho"> Ghi nhớ
                        </label>
                    </div>
                </div>
            </div>
            
            <hr />
            
            <div class="row">
                <div class="col-md-3"></div>
                <div align="center" class="col-md-6" style="padding-bottom:3em">
                	{if isset($err)}
                        <p class="login-box-msg text-danger">{$err}</p>
                    {/if}
                	<a class="btn btn-link" href="#">Quên mật khẩu?</a>
                    <a class="btn btn-link" href="{$path_smarty}dang-ky-tai-khoan.html">Đăng ký tài khoản</a><br>
					
                    <button type="submit" class="btn btn-success">Đăng nhập</button>
                     
                </div>
            </div>
            
        </form>
    </div>
{/block}