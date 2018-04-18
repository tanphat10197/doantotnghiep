{extends file='layoutAdmin/master.tpl'}
{block name='content'}
<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h1 align="center" class="text-info">DANH SÁCH LOẠI SẢN PHẨM</h1>
                          </header>
                          <div class="panel-body">

                                <table class="table">
                                <thead>
                                  <tr>
                                    <th>Mã loại</th>
                                    <th>Tên loại</th>
                                    <th>Tên loại url</th>
                                    <th>Mã loại cha</th>
                                    <th>Hình</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    {foreach $DSLoaiSanPham as $sp}
                                      <tr>
                                        <td>{$sp['ma_loai']}</td>
                                        <td>{$sp['ten_loai']}</td>
                                        <td>{$sp['ten_loai_url']}</td>
                                        <td>{$sp['ma_loai_cha']}</td>
                                        <td>{$sp['hinh']}</td>
                                        <td><a href="{$path_smarty}quan-tri/sua-loai-san-pham/{$sp['ma_loai']}">Sửa</a></td>
                                        <td><a onclick="return confirm('Bạn có chắc chắn muốn xoá sản phẩm này?')" href="{$path_smarty}quan-tri/xoa-loai-san-pham/{$sp['ma_loai']}">Xóa</a></td>
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