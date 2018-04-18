{extends file='layout/master.tpl'}
{block name='title'}{$bai_viet['tieu_de']} - DTGear Shop - Shop Gaming Gear HCM{/block} 
{block name='keywords'}Chi tiet Bai viet cong nghe cua dtgearshop{/block}
{block name='content'}

	<div class="container" style="margin-top: 20px">
        <div class="row">
            <div class="col-md-12">
                
                <div style="float: left" class="col-md-3">
                    <img src="{$path_smarty}Public/images/banner/icon_lich.png" width="25px" style="float: left" />
                    <p>{$bai_viet['ngay_xuat_ban']}</p>
                </div>
                <div style="float: left" class="col-md-3">
                    <img src="{$path_smarty}Public/images/banner/icon_folder.png" width="25px" style="float: left" />
                     <p>{$bai_viet['ten_loai_bai_viet']}</p>
                </div>
                <div>
                    <img src="{$path_smarty}Public/images/banner/icon_view.png" width="25px" style="float: left" />
                    <p>{$bai_viet['so_lan_xem']}</p>
                </div>
                <h3 style="color:black">{$bai_viet['tieu_de']}</h3>

                <hr/>
                <div class="row">
                    <div class="col-md-12">
                        <p>{$bai_viet['noi_dung_chi_tiet']}</p>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>

{/block}