{extends file='layoutAdmin/master.tpl'}
{block name='content'}
<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h1 align="center" class="text-info">CHI TIẾT ĐƠN ĐẶT HÀNG SỐ {$mahd}</h1>
                          </header>
                          <div class="panel-body">

                                <table class="table">
                                <thead>
                                  <tr>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Thành tiền</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    {foreach $CTDonHang as $ct}
                                    <tr>
                                        <td>{$ct['ma_san_pham']}</td>
                                        <td>{$ct['ten_san_pham']}</td>
                                        <td>{$ct['so_luong']}</td>
                                        <td>{$ct['don_gia']}</td>
                                        <td>{$ct['so_luong'] * $ct['don_gia']}</td>
                                    </tr>
                                    {/foreach}
                                </tbody>
                              </table>

                          </div>
                      </section>
                  </div>

              </div>
{/block}