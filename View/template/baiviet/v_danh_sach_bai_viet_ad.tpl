{extends file='layoutAdmin/master.tpl'}
{block name='content'}
<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h1 align="center" class="text-info">DANH SÁCH BÀI VIẾT</h1>
                          </header>
                          <div class="panel-body">

                                <table class="table">
                                <thead>
                                  <tr>
                                    <th>Mã bài viết</th>
                                    <th>Loại bài viết</th>
                                    <th>Tiêu đề</th>
                                    <th>Tiêu đề url</th>
                                    <th>Ngày xuất bản</th>
                                    <th>Số lần xem</th>
                                    <th>Hình</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    {foreach $DSBV as $bv}
                                      <tr>
                                        <td>{$bv['ma_bai_viet']}</td>
                                        <td>{$bv['ten_loai_bai_viet']}</td>
                                        <td>{$bv['tieu_de']}</td>            
                                        <td>{$bv['tieu_de_bai_viet_url']}</td>
                                        <td>{$bv['ngay_xuat_ban']}</td>
                                        <td>{$bv['so_lan_xem']}</td>
                                        <td><img src="{$path_smarty}Public/images/bai_viet/{$bv['hinh']}" width="50px" class="rounded"></td>
                                        <td><a href="{$path_smarty}quan-tri/sua-bai-viet/{$bv['ma_bai_viet']}">Sửa</a></td>
                                        <td><a onclick="return confirm('Bạn có chắc chắn muốn xoá sản phẩm này?')" href="{$path_smarty}quan-tri/xoa-bai-viet/{$bv['ma_bai_viet']}">Xóa</a></td>
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