{extends file='layout/master.tpl'}
{block name='title'}Tìm kiếm sản phẩm - DTGear Shop - Shop Gaming Gear HCM{/block} 
{block name='keywords'}Shop gaming gear noi tieng nhat ho chi minh{/block}


{block name='content'}
<div class="container" style="margin-top: 20px">
        <div class="row" style="margin-bottom: 15px;">
            <div class="col-md-12">
                <div class="bg-header"> 
                    <h4 class="bg-danger text-white" style="padding:10px; width:60%"><i>KẾT QUẢ TÌM KIẾM </i>
                        </h4>
                </div>
            </div>
        </div>
        
        <br />
        {if !isset($err)}
            {include file='sanpham/v_thump_san_pham.tpl'}
        {else}
            <i><h3 class="text-danger text-center" style="padding:0 0 10em 0">{$err}</h3></i>
        {/if}
    </div>
{/block}
