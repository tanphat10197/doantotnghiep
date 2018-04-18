{extends file='layoutAdmin/master.tpl'}
{block name='content'}
<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h1 align="center" class="text-info">DANH SÁCH TÀI KHOẢN</h1>
                          </header>
                          <div class="panel-body">

                                <table class="table">
                                <thead>
                                  <tr>
                                    <th>Mã người dùng</th>
                                    <th>Loại người dùng</th>
                                    <th>Họ Tên</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Mật khẩu</th>
                                    <th>Email</th>
                                    <th>Điện thoại</th>
                                    <th>Ngày đăng ký</th>
                                  </tr>
                                </thead>
                                <tbody>
                                     {foreach $DSNguoiDung as $nd}
                                      <tr>
                                        <td>{$nd['ma_nguoi_dung']}</td>
                                        <td>{if $nd['ma_loai_nguoi_dung'] == 1}Admin {else} Khách hàng {/if}</td>
                                        <td>{$nd['ho_ten']}</td>
                                        <td>{$nd['ten_dang_nhap']}</td>
                                        <td>{$nd['mat_khau']}</td>
                                        <td>{$nd['email']}</td>
                                        <td>{$nd['dien_thoai']}</td>
                                        <td>{$nd['ngay_dang_ky']}</td>
                                        <td><a href="{$path_smarty}quan-tri/sua-tai-khoan/{$nd['ma_nguoi_dung']}">Sửa</a></td>
                                        <td><a onclick="return confirm('Bạn có chắc chắn muốn xoá sản phẩm này?')" href="{$path_smarty}quan-tri/xoa-tai-khoan/{$nd['ma_nguoi_dung']}">Xóa</a></td>
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