{extends file='layoutAdmin/master.tpl'}
{block name='content'}
<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h1 align="center" class="text-info">DANH SÁCH SẢN PHẨM</h1>
                          </header>
                          <div class="panel-body">

                                <table class="table">
                                <thead>
                                  <tr>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Mã loại</th>
                                    <th>Đơn giá</th>
                                    <th>Hình</th>
                                    <th>Sản phẩm mới</th>
                                    <th>Số lần xem</th>
                                    <th>Ngày tạo</th>
                                    <th>Trả góp</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    {foreach $DSSanPham as $sp}
                                      <tr>
                                        <td>{$sp['ma_san_pham']}</td>
                                        <td>{$sp['ten_san_pham']}</td>
                                        <td>{$sp['ma_loai']}</td>
                                        <td>{number_format($sp['don_gia'])}</td>
                                        <td><img src="{$path_smarty}Public/images/hinh_san_pham/{$sp['hinh']}" width="50px" class="rounded"></td>
                                        <td>{$sp['san_pham_moi']}</td>
                                        <td>{$sp['so_lan_xem']}</td>
                                        <td>{$sp['ngay_tao']}</td>
                                        <td><a href="{$path_smarty}quan-tri/sua-san-pham/{$sp['ma_san_pham']}">Sửa</a></td>
                                        <td><a onclick="return confirm('Bạn có chắc chắn muốn xoá sản phẩm này?')" href="{$path_smarty}quan-tri/xoa-san-pham/{$sp['ma_san_pham']}">Xóa</a></td>
                                        <td><a href="{$path_smarty}quan-tri/tra-gop-san-pham/{$sp['ma_san_pham']}">Trả góp</a></td>
                                      </tr>
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