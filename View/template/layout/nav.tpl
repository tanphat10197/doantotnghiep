<div class="container-field" style="background-color: #f2f2f2">
    <div class="container">
        <nav class="navbar navbar-toggleable-md navbar-light">
              <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <a class="navbar-brand" href="{$path_smarty}">
                <img src="{$path_smarty}Public/images/banner/img_banner_04.jpg" width="150px" class="rounded">
              </a>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
    
                  <li class="nav-item dropdown " style="margin:0">
                            <a class="nav-link dropdown-toggle list"  href="#">
                                <strong style="color:black">
                                    <img src="{$path_smarty}Public/images/banner/red_list.png" width="21px">DANH MỤC
                                </strong>  
                            </a>
                            
                            <div class="dropdown-menu dropdown-content" style="margin:0">
                                <ul style="list-style-type:none; padding:0; transition: all 0.3s ease-out;">
                                {if $DSLoaiSanPham}
                                    {foreach $DSLoaiSanPham as $tenLoai}
        								                {$LoaiCha=$tenLoai[0]}
                                        {$DSLoaiCon=$tenLoai[1]}
                                        <li class="dropdown-submenu">
                                            <a class="border-bottom" href="">{$LoaiCha['ten_loai']}</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                	{if $DSLoaiCon}
                                                        {foreach $DSLoaiCon as $loaiCon}
                                                            <a class="dropdown-item border-bottom" href="{$path_smarty}danh-muc/{$LoaiCha['ten_loai_url']}/{$loaiCon['ten_loai_url']}-{$loaiCon['ma_loai']}.html">{$loaiCon['ten_loai']}</a>
                                                        {/foreach}
                                                    {/if}
                                                </li> 
                                            </ul>
                                        </li>
        
                                    {/foreach}
                                {/if}
                                </ul>
                            </div>
                        </li>
    				
                    
                  <li class="nav-item">
                    <a class="nav-link text-dark" href="{$path_smarty}san-pham/danh-sach-san-pham.html"><b>Sản Phẩm</b></a>
                  </li>
                  <li class="nav-item" >
                    <a class="nav-link text-dark" href="{$path_smarty}bai-viet/danh-sach-bai-viet.html"><b>Bài Viết</b></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-danger" href="{$path_smarty}lien-he-chung-toi.html"><b>Liên Hệ</b></a>
                  </li>
                </ul>
              </div>
        </nav>
    </div>
</div>
