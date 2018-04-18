{extends file='layoutAdmin/master.tpl'}
{block name='content'}
<script src="{$path_smarty}Public/ckeditor/ckeditor.js"></script>
    <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h1 align="center" class="text-info">THÊM SẢN PHẨM</h1>
                          </header>
                          <div class="panel-body">
                            <h3 align="center">{$dataErr['err']}</h3>
                              <div class="form">
                                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="" enctype="multipart/form-data">
                                  
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Tên sản phẩm
                                          <span class="required">{$dataErr['ten_san_pham']}</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="ten_id" name="ten_san_pham" type="text" value="{$data['ten_san_pham']}"/>
                                          </div>
                                      </div>
                                      <!--ten_mon_url-->
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Tên URL 
                                          <span class="required">{$dataErr['ten_san_pham_url']}</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="ten_id_url" name="ten_san_pham_url"  type="text" value="{$data['ten_san_pham_url']}"/>
                                          </div>
                                      </div>
                                       <!--ten_mon_url-->
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Loại sản phẩm</label>
                                          <div class="col-lg-10">
                                              <select name="slMa_loai">
                                                {if $DSLoaiMonAn}
                                                    {foreach $DSLoaiMonAn as $itemSL}
                                                        {$LoaiChaSL=$itemSL[0]}
                                                        {$DSLoaiConSL=$itemSL[1]}
                                                        <optgroup label="{$LoaiChaSL['ten_loai']}">
                                                            {if $DSLoaiConSL}
                                                                {foreach $DSLoaiConSL as $LoaiConSL}
                                                                    
                                                                    <option value="{$LoaiConSL['ma_loai']}" 
                                                                        {if $LoaiConSL['ma_loai'] == $data['ma_loai']} selected="selected" {/if}
                                                                        >{$LoaiConSL['ten_loai']}
                                                                    </option>

                                                                {/foreach}
                                                            {/if}
                                                        </optgroup>
                                                    {/foreach}
                                                {/if}
                                              </select>
                                          </div>
                                      </div>
                                      <!--don_gia-->
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Đơn giá 
                                          <span class="required">{$dataErr['don_gia']}</span></label>
                                          <div class="col-lg-4">
                                              <input class="form-control" id="don_gia" name="don_gia" type="number" value="{$data['don_gia']}"/>
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Hình
                                          <span class="required">{$dataErr['hinh']}</span></label>
                                          <div class="col-lg-10">
                                              <input type="file" name="hinh"/>
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Nội Dung Tóm Tắt 
                                          <span class="required">{$dataErr['mo_ta_tom_tat']}</span></label>
                                          <div class="col-lg-10">
                                              <textarea name="mo_ta_tom_tat" class="form-control">{$data['mo_ta_tom_tat']}</textarea>                                             
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Nội Dung Chi tiết 
                                          <span class="required">{$dataErr['mo_ta_chi_tiet']}</span></label>
                                          <div class="col-lg-10">
                                              <textarea name="mo_ta_chi_tiet" class="ckeditor">{$data['mo_ta_chi_tiet']}</textarea>                                             
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