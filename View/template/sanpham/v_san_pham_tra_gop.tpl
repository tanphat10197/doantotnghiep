{extends file='layoutAdmin/master.tpl'}
{block name='content'}
<script src="{$path_smarty}Public/ckeditor/ckeditor.js"></script>
    <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h1 align="center" class="text-info">SẢN PHẨM TRẢ GÓP</h1>
                          </header>
                          <div class="panel-body">
                              <h3 align="center">{$err}</h3>
                              <div class="form">
                                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="" enctype="multipart/form-data">
                                  
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Mã sản phẩm
                                          <span class="required"></span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="ma_san_pham" name="ma_san_pham" type="text" value="{$masp}" disabled="disabled" />
                                          </div>
                                      </div>
                                      <!--ten_mon_url-->
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Từ ngày 
                                          <span class="required"></span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="tu_ngay" name="tu_ngay"  type="date" value="{$data['tu_ngay']}"/>
                                          </div>
                                      </div>
                                     <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Đến ngày
                                          <span class="required"></span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="den_ngay" name="den_ngay"  type="date" value="{$data['den_ngay']}"/>
                                          </div>
                                      </div>
                                      
                                       <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Thông tin trả góp
                                          <span class="required"></span></label>
                                          <div class="col-lg-10">
                                              <textarea name="thong_tin_tra_gop" class="ckeditor"></textarea>                                             
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <input class="btn btn-primary" type="submit" value="Thêm" name="btnThem"/>
                                              <a href="{$path_smarty}quan-tri/tra-gop-san-pham.html"><input class="btn btn-warning" type="button" value="Reset" name="btnReset"/></a>
                                          </div>
                                      </div>
                                  </form>
                              </div>

                          </div>
                      </section>
                  </div>
              </div>
{/block}