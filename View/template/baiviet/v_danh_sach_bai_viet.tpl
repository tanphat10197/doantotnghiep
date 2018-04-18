{extends file='layout/master.tpl'}
{block name='title'}Tin Tức Công Nghệ, Bài Viết Shop DTGear - DTGear Shop - Shop Gaming Gear HCM{/block} 
{block name='keywords'}Bai viet cong nghe cua dtgearshop{/block}
{block name='content'}

{foreach $DSBV as $bv}
	<div class="container" style="margin-top: 20px">
        <div class="row">
            <div class="col-md-12">
                
                <div style="float: left" class="col-md-3">
                    <img src="{$path_smarty}Public/images/banner/icon_lich.png" width="25px" style="float: left" />
                    <p>{$bv['ngay_xuat_ban']}</p>
                </div>
                <div style="float: left" class="col-md-3">
                    <img src="{$path_smarty}Public/images/banner/icon_folder.png" width="25px" style="float: left" />
                     <p>{$bv['ten_loai_bai_viet']}</p>
                </div>
                <div>
                    <img src="{$path_smarty}Public/images/banner/icon_view.png" width="25px" style="float: left" />
                    <p>{$bv['so_lan_xem']}</p>
                </div>
                <h3 style="color:black">{$bv['tieu_de']}</h3>

                <hr/>
                <div class="row">
                    <div class="col-md-4">
                        <img src="{$path_smarty}Public/images/bai_viet/{$bv['hinh']}" width="100%" />
                    </div>
                    <div class="col-md-8">
                        <p>{$bv['noi_dung_tom_tat']}</p>
                    </div>
                        
                </div>

                <a href="{$path_smarty}bai-viet/{$bv['tieu_de_bai_viet_url']}-{$bv['ma_bai_viet']}.html" style="text-decoration: none; color:#ff6600">Đọc Thêm</a>
            </div>
        </div>
    </div>
{/foreach}
{if isset($linkPage)}
    <div class="container">
        <div class="row">
            <div class="col-md-4">
            
            </div>
            <div align="center" class="col-md-5">
                <p>{$linkPage}</p>
            </div>
            <div class="col-md-3">
            
            </div>
        </div>
    </div>
{/if}

{/block}