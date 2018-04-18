<link rel="stylesheet" type="text/css" href="Public/dist/css/bootstrap.css"/>
{extends file='layout/master.tpl'}
{block name='title'}Máy Tính PC, Laptop Gaming MSI & ASUS chính hãng - DTGear{/block} 
{block name='keywords'}Shop gaming gear noi tieng nhat ho chi minh{/block}
{block name='banner'}{include file='layout/banner.tpl'}{/block} 
{block name='content'}
	<div class="container" style="margin-top: 20px;">
    	<div class="row" style="margin-bottom: 20px;">
        	<div class="col-md-12">
            	<div class="bg-header">	
            		<h4 class="bg-danger text-white" style="padding:10px; width:60%"><i>SẢN PHẨM HOT</i>
                        </h4>
                </div>
            </div>
        </div>
		
        <br />
        {include file='sanpham/v_thump_san_pham.tpl'}
	</div>

    <div class="container">
        <div class="row">
            <div class="col-md-3" align="center" style="margin-bottom: 10px;">
                <img src="{$path_smarty}Public/images/banner/img_banner_05.png" class="rounded img-hover">
            </div>

            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12"  style="margin-bottom: 15px;">
                        <div class="bg-header"> 
                            <h4 class="bg-danger text-white" style="padding:10px; width:60%"><i>LAPTOP CHÍNH HÃNG GIÁ TỐT</i>
                                </h4>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px">
                    {foreach $sanphamlaptop as $sp}
                        <div class="col-md-4">
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
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12" style="margin-bottom: 15px;">
                        <div class="bg-header"> 
                            <h4 class="bg-danger text-white" style="padding:10px; width:60%"><i>SẢN PHẨM TRẢ GÓP LÃI XUẤT 0%</i>
                                </h4>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px">
                    {foreach $sanphamtragop as $sp}
                        <div class="col-md-4">
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
            </div>

            <div class="col-md-3"  align="center">
                <img src="{$path_smarty}Public/images/banner/img_banner_06.jpg"
                     class="rounded img-hover" width="260px" height="450px">
            </div>
        </div>
    </div>

   
{/block}