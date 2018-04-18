{extends file='layout/master.tpl'}
{block name='title'}Giỏ hàng của bạn - DTGear Shop - Shop Gaming Gear HCM{/block} 
{block name='keywords'}thong tin gio hang{/block}
{block name='content'}
     <div class="container">
     	<div class="row">
        	<div class="col-md-12" style="margin:25px">
        		<h2 align="center" class="text-success">THÔNG TIN GIỎ HÀNG CỦA BẠN</h2>
            </div>
        	<div class="col-md-12">
            
             {if $ttGioHang}
             <form method="post" action="{$path_smarty}khach-hang/cap-nhat-gio-hang.html">
             	<div class="table-responsive">
                <table class="table">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col"></th>
                      <th scope="col">Tên sản phẩm</th>
                      <th scope="col">Mã sản phẩm</th>
                      <th scope="col">Đơn giá</th>
                      <th scope="col">Số lượng</th>
                      <th scope="col">Thành tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                  {$i=1}
                  {foreach $ttGioHang as $id=>$arrTT}
                    <tr>
                      <th scope="row">{$i}</th>
                      <td>{$arrTT[2]}</td>
                      <td>{$id}</td>
                      <td>{$arrTT[0]}</td>
                      <td>
                      	<input type="number" value="{$arrTT[1]}" name="sl_{$id}" style="text-align:center">
                        </td>
                      <td>{number_format($arrTT[0]*$arrTT[1])}</td>
                    </tr>
                    {$i=$i+1}
                   {/foreach}
                  </tbody>
                  <tfoot>
                  	<tr>
                    	<td align="center" colspan="7">
                        	<h4 align="right" class="text-danger">Tổng tiền: {number_format($tong_tien)}</h4>
                        </td>
                    </tr>
                  	<tr>
                    	<td align="center" colspan="6">
                        	<input type="submit" value="Cập nhật" class="btn btn-primary">
                            <a href="{$path_smarty}khach-hang/dat-hang.html" class="btn btn-success">Đặt hàng</a>
                            <a href="{$path_smarty}khach-hang/huy-gio-hang.html" class="btn btn-info">Hủy giỏ hàng</a>
                            <br/>
                            <i>Nhập số lượng 0 nếu muốn hủy mặt hàng</i>
                        </td>
                    </tr>
                  </tfoot>
                </table>
                </div>
                </form>
             {else}
                <div class="col-md-12" style="margin:25px">
        			<h2 align="center" class="text-danger" style="margin-bottom:3em">GIỎ HÀNG CỦA BẠN RỖNG<br />
                    	BẤM VÀO <a href="{$path_smarty}san-pham/danh-sach-san-pham.html" class="text-warning">ĐÂY</a> ĐỂ MUA HÀNG
                    </h2>
            	</div>
             {/if}
     		</div>
     	</div>
     </div>
{/block} 