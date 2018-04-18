{extends file='layoutAdmin/master.tpl'}
{block name='content'}
<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h1 align="center" class="text-info">DANH SÁCH ĐƠN ĐẶT HÀNG</h1>
                          </header>
                          <div class="panel-body">

                                <table class="table">
                                <thead>
                                  <tr>
                                    <th>Số hóa đơn</th>
                                    <th>Ngày hóa đơn</th>
                                    <th>Tên khách hàng</th>
                                    <th>Số điện thoại</th>
                                    <th>Trị giá</th>
                                    <th>Tình trạng</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    {foreach $DSDonHang as $dh}
                                      {if $dh['tinh_trang'] == 0}
                                        <tr class="bg-danger">
                                          <td>{$dh['so_hoa_don']}</td>
                                          <td>{$dh['ngay_hd']}</td>
                                          <td>{$dh['ten_khach_hang']}</td>
                                          <td>{$dh['dien_thoai']}</td>
                                          <td>{number_format($dh['tri_gia'])}</td>
                                          <td>Chưa giao</td>
                                          <td><a href="{$path_smarty}quan-tri/chi-tiet-don-hang/{$dh['so_hoa_don']}">Chi tiết</a></td>
                                          <td><a onclick="return confirm('Bạn có chắc chắn muốn xoá sản phẩm này?')" href="{$path_smarty}quan-tri/xoa-don-dat-hang/{$dh['so_hoa_don']}">Xóa hóa đơn</a></td>
                                          <td><a onclick="return confirm('Bạn có chắc chắn cập nhật tình trạng này?')" href="{$path_smarty}quan-tri/cap-nhat-tinh-trang/{$dh['so_hoa_don']}">Cập nhật tình trạng</a></td>
                                        </tr>
                                      {else}
                                         <tr>
                                          <td>{$dh['so_hoa_don']}</td>
                                          <td>{$dh['ngay_hd']}</td>
                                          <td>{$dh['ten_khach_hang']}</td>
                                          <td>{$dh['dien_thoai']}</td>
                                          <td>{$dh['tri_gia']}</td>
                                          <td>Đã giao</td>
                                        </tr>
                                      {/if}
                                    {/foreach}
                                </tbody>
                              </table>

                          </div>
                      </section>
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
              </div>
{/block}