<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{$path_smarty}Public/images/banner/user.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{$ten}</p>
              <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">DANH MỤC QUẢN LÝ</li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Sản Phẩm</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{$path_smarty}quan-tri/danh-sach-san-pham.html"><i class="fa fa-circle-o"></i> Danh Sách Sản Phẩm</a></li>
                <li><a href="{$path_smarty}quan-tri/them-san-pham.html"><i class="fa fa-circle-o"></i> Thêm Sản Phẩm</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Loại sản phẩm</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{$path_smarty}quan-tri/danh-sach-loai-san-pham.html"><i class="fa fa-circle-o"></i>Danh Sách Loại sản phẩm</a></li>
                <li><a href="{$path_smarty}quan-tri/them-loai-san-pham.html"><i class="fa fa-circle-o"></i>Thêm Loại sản phẩm</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="{$path_smarty}quan-tri/don-dat-hang.html">
                <i class="fa fa-dashboard"></i> <span>Đơn đặt hàng</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Tài khoản</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{$path_smarty}quan-tri/danh-sach-tai-khoan.html"><i class="fa fa-circle-o"></i>Danh sách tài khoản</a></li>
                <li><a href="{$path_smarty}quan-tri/them-tai-khoan.html"><i class="fa fa-circle-o"></i>Thêm tài khoản</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Bài viết</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{$path_smarty}quan-tri/danh-sach-bai-viet.html"><i class="fa fa-circle-o"></i>Danh sách bài viết</a></li>
                <li><a href="{$path_smarty}quan-tri/them-bai-viet.html"><i class="fa fa-circle-o"></i>Thêm bài viết</a></li>
              </ul>
            </li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>