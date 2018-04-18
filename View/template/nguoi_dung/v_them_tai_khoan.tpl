{extends file='layoutAdmin/master.tpl'}
{block name='content'}
<script src="{$path_smarty}Public/ckeditor/ckeditor.js"></script>
    <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h1 align="center" class="text-info">THÊM TÀI KHOẢN</h1>
                          </header>
                          <div class="panel-body">
                            <h3 align="center">{$dataErr['err']}</h3>
                              <div class="form">
                                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="" enctype="multipart/form-data">
                                  
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Họ Tên
                                          <span class="required">{$dataErr['ho_ten']}</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="ho_ten" name="ho_ten" type="text" value="{$data['ho_ten']}"/>
                                          </div>
                                      </div>
                                      <!--ten_mon_url-->
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Tên Đăng Nhập
                                          <span class="required">{$dataErr['ten_dang_nhap']}</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="ten_dang_nhap" name="ten_dang_nhap"  type="text" value="{$data['ten_dang_nhap']}"/>
                                          </div>
                                      </div>

                                       <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Mật khẩu
                                          <span class="required">{$dataErr['mat_khau']}</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="mat_khau" name="mat_khau"  type="text" value="{$data['mat_khau']}"/>
                                          </div>
                                      </div>

                                       <!--ten_mon_url-->
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Loại người dùng</label>
                                          <div class="col-lg-10">
                                              <select name="slMa_loai">
                                               {if $DSNguoiDung}
                                                    {foreach $DSNguoiDung as $item}   
                                                            <option value="{$item['ma_loai_nguoi_dung']}" 
                                                                  {if $item['ma_loai_nguoi_dung'] == $data['ma_loai_nguoi_dung']} selected="selected" {/if}
                                                                  >{$item['ten_loai_nguoi_dung']}
                                                            </option>
                                                    {/foreach}
                                                {/if}
                                              </select>
                                          </div>
                                      </div>
                                      <!--don_gia-->
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Email
                                          <span class="required">{$dataErr['email']}</span></label>
                                          <div class="col-lg-4">
                                              <input class="form-control" id="email" name="email" type="email" value="{$data['email']}"/>
                                          </div>
                                      </div>

                                       <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Điện thoại
                                          <span class="required">{$dataErr['dien_thoai']}</span></label>
                                          <div class="col-lg-4">
                                              <input class="form-control" id="dien_thoai" name="dien_thoai" type="number" value="{$data['dien_thoai']}"/>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <input class="btn btn-primary" type="submit" value="Thêm" name="btnThem"/>
                                              <a href="{$path_smarty}quan-tri/them-tai-khoan.html"><input class="btn btn-warning" type="button" value="Reset" name="btnReset"/></a>
                                          </div>
                                      </div>
                                  </form>
                              </div>

                          </div>
                      </section>
                  </div>
              </div>
{/block}