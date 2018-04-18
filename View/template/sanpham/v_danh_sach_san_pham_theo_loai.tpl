{extends file='layout/master.tpl'}
{block name='title'}DTGear Shop - Shop Gaming Gear HCM{/block} 
{block name='keywords'}Shop gaming gear noi tieng nhat ho chi minh{/block}


{block name='content'}
	<div class="container" style="margin-top: 20px;">
    	<div class="row" style="margin-bottom: 15px;">
        	<div class="col-md-12">
            	<div class="bg-header">	
            		<h4 class="bg-danger text-white" style="padding:10px; width:60%"><i>SẢN PHẨM THEO LOẠI</i></h4>
                </div>
            </div>
        </div>
		
        <br />
        {include file='sanpham/v_doc_danh_sach_san_pham.tpl'}
        {if isset($linkPage)}
        <div class="row">
            <div class="col-md-4">
            
            </div>
            <div align="center" class="col-md-5">
                <p>{$linkPage}</p>
            </div>
            <div class="col-md-3">
            
            </div>
        </div>
        {/if}
	</div>
{/block}
