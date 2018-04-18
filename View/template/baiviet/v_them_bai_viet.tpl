{extends file='layoutAdmin/master.tpl'}
{block name='content'}
<script src="{$path_smarty}Public/ckeditor/ckeditor.js"></script>
    <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h1 align="center" class="text-info">THÊM BÀI VIẾT</h1>
                          </header>
                          <div class="panel-body">
                            <h3 align="center">{$dataErr['err']}</h3>
                              <div class="form">
                                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="" enctype="multipart/form-data">
                                  
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Tiêu đề
                                          <span class="required">{$dataErr['tieu_de']}</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="ten_id" name="tieu_de" type="text" value="{$data['tieu_de']}"/>
                                          </div>
                                      </div>
                                      <!--ten_mon_url-->
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Tiêu đề URL 
                                          <span class="required">{$dataErr['tieu_de_bai_viet_url']}</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="ten_id_url" name="tieu_de_bai_viet_url"  type="text" value="{$data['tieu_de_bai_viet_url']}"/>
                                          </div>
                                      </div>
                                       <!--ten_mon_url-->
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Loại Bài viết</label>
                                          <div class="col-lg-10">
                                              <select name="slMa_loai">
                                                <option value="0">0</option>
                                                {if $LoaiBV}
                                                    {foreach $LoaiBV as $item}   
                                                            <option value="{$item['ma_loai_bai_viet']}" 
                                                                  {if $item['ma_loai_bai_viet'] == $data['ma_loai_bai_viet']} selected="selected" {/if}
                                                                  >{$item['ten_loai_bai_viet']}
                                                            </option>
                                                    {/foreach}
                                                {/if}
                                              </select>
                                          </div>
                                      </div>
                                      <!--don_gia-->
                                     
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Hình
                                          <span class="required">{$dataErr['hinh']}</span></label>
                                          <div class="col-lg-10">
                                              <input type="file" name="hinh"/>
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Nội Dung Tóm Tắt 
                                          <span class="required">{$dataErr['noi_dung_tom_tat']}</span></label>
                                          <div class="col-lg-10">
                                              <textarea name="noi_dung_tom_tat" class="form-control">{$data['noi_dung_tom_tat']}</textarea>                                             
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Nội Dung Chi tiết 
                                          <span class="required">{$dataErr['noi_dung_chi_tiet']}</span></label>
                                          <div class="col-lg-10">
                                              <textarea name="noi_dung_chi_tiet" class="ckeditor">{$data['noi_dung_chi_tiet']}</textarea>                                             
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <input class="btn btn-primary" type="submit" value="Thêm" name="btnThem"/>
                                              <a href="{$path_smarty}quan-tri/san-pham/them-san-pham.html"><input class="btn btn-warning" type="button" value="Reset" name="btnReset"/></a>
                                          </div>
                                      </div>
                                  </form>
                              </div>

                          </div>
                      </section>
                  </div>
              </div>
{/block}