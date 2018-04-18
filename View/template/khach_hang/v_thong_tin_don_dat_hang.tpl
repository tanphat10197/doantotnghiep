{extends file='layout/master.tpl'}
{block name='title'}Thông tin đơn đặt hàng của bạn - DTGear Shop - Shop Gaming Gear HCM{/block} 
{block name='content'}
 <div class="container">
     	<div class="row">
        	<div class="col-md-12" style="margin:25px">
    <h3 class="text-info">Thông tin đơn đặt hàng</h3>
    <div class="form-horizontal" style="border: 1px solid  #99ccff">
    
      <div class="form-group row">
        <label for="inputEmail3" class="col-md-1 control-label"><strong>Mã KH</strong></label>
        <div class="col-md-4">
          <label  class="control-label">{$DonDatHang[0]['ma_khach_hang']}</label>
        </div>
        <label for="inputEmail3" class="col-md-2 control-label"><Strong>Họ tên khách hàng</Strong></label>
        <div class="col-md-4">
          <label class="control-label">{$DonDatHang[0]['ten_khach_hang']}</label>
        </div>
      </div>
      
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-1 control-label"><strong>Email</strong></label>
        <div class="col-sm-4">
          <label  class="control-label">{$DonDatHang[0]['email']}</label>
        </div>
        <label for="inputEmail3" class="col-sm-2 control-label"><strong>Điện thoại</strong></label>
        <div class="col-sm-4">
          <label class="control-label">{$DonDatHang[0]['dien_thoai']}</label>
        </div>
      </div>
      
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-1 control-label"><strong>Địa chỉ</strong></label>
        <div class="col-sm-4">
          <label  class="control-label">{$DonDatHang[0]['dia_chi']}</label>
        </div>  

        <label for="inputEmail3" class="col-sm-2 control-label"><Strong>Ngày lập hóa đơn</Strong></label>
        <div class="col-sm-4">
          <label class="control-label">{$DonDatHang[0]['ngay_hd']}</label>
        </div>
      </div>
      
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-1 control-label"><strong>Số HD</strong></label>
        <div class="col-sm-2">
          <label  class="control-label">{$DonDatHang[0]['so_hoa_don']}</label>
        </div>
        
      </div>
      
    </div>
    {if isset($DonDatHang)}
        <table class="table table-striped" style="margin-top: 5px">
          <tr style="background-color:#99ccff; font-weight: bold"><td>STT</td><td>Mã Sản Phẩm</td><td>Tên Sản Phẩm</td><td align="right">Đơn giá</td><td align="right">Số lượng</td><td align="right">Thành tiền</td></tr>
          {$i=1}
          {$TongTienMon=0}
          {foreach $DonDatHang as $ttMon}
            <tr>
                <td>{$i}</td>
                <td>{$ttMon['ma_san_pham']}</td>
                <td>{$ttMon['ten_san_pham']}</td>
                <td align="right">{number_format($ttMon['don_gia'])}</td>
                <td align="right">{number_format($ttMon['so_luong'])}</td>
                <td align="right">{number_format($ttMon['don_gia']*$ttMon['so_luong'])}</td>
            </tr>
            {$TongTienMon=$TongTienMon+($ttMon['don_gia']*$ttMon['so_luong'])}
            {$i=$i+1}
          {/foreach}
          <tr>
            <td colspan="5"></td>
            <td align="right"><h5>Tổng tiền:<span style="color:red">{number_format($TongTienMon)} VND</span></h5></td>
          </tr>
        </table>
    {/if}
</div>
     	</div>
     </div>
{/block}