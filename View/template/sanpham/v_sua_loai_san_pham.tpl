{extends file='layoutAdmin/master.tpl'}
{block name='content'}
<script src="{$path_smarty}Public/ckeditor/ckeditor.js"></script>
    <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h1 align="center" class="text-info">SỬA LOẠI SẢN PHẨM</h1>
                          </header>
                          <div class="panel-body">
                            <h3 align="center">{$dataErr['err']}</h3>
                              <div class="form">
                                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="" enctype="multipart/form-data">
                                  
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Tên Loại
                                          <span class="required">{$dataErr['ten_loai']}</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="ten_id" name="ten_loai" type="text" value="{$data['ten_loai']}"/>
                                          </div>
                                      </div>
                                      <!--ten_mon_url-->
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Tên URL 
                                          <span class="required">{$dataErr['ten_loai_url']}</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="ten_id_url" name="ten_loai_url"  type="text" value="{$data['ten_loai_url']}"/>
                                          </div>
                                      </div>
                                       <!--ten_mon_url-->
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Mã loại sản phẩm cha</label>
                                          <div class="col-lg-10">
                                              <select name="slMa_loai">
                                                <option value="0">0</option>
                                                {if $DSLoaiSp}
                                                    {foreach $DSLoaiSp as $item}   
                                                            <option value="{$item['ma_loai']}" 
                                                                  {if $item['ma_loai'] == $data['ma_loai_cha']} selected="selected" {/if}
                                                                  >{$item['ten_loai']}
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
                                          <label for="cname" class="control-label col-lg-2">Mô Tả
                                          <span class="required"></span></label>
                                          <div class="col-lg-10">
                                              <textarea name="mo_ta" class="ckeditor">{$data['mo_ta']}</textarea>                                             
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <input class="btn btn-primary" type="submit" value="Sửa" name="btnSua"/>
                                              <a href="{$path_smarty}quan-tri/sua-loai-san-pham.html"><input class="btn btn-warning" type="button" value="Reset" name="btnReset"/></a>
                                          </div>
                                      </div>
                                  </form>
                              </div>

                          </div>
                      </section>
                  </div>
              </div>
{/block}