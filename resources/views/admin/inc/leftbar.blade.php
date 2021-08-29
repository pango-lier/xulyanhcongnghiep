<nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="admin/home">
                          <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
                          <span class="menu-title">Trang chủ</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/category">
                          <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
                          <span class="menu-title">Danh mục</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/post">
                          <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
                          <span class="menu-title">Bài viết</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/product">
                          <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
                          <span class="menu-title">Sản Phẩm</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/slider">
                          <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
                          <span class="menu-title">Slider</span>
                        </a>
                    </li>
                @if (Gate::forUser(auth()->guard('admin_users')->user())->allows('is-admin'))
                    <li class="nav-item">
                        <a class="nav-link" href="admin/admin_user">
                          <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
                          <span class="menu-title">Quản trị viên</span>
                        </a>
                     </li>   
                  @endif
                    <li class="nav-item">
                        <a class="nav-link" href="admin/intercooperation">
                          <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
                          <span class="menu-title">Đối tác</span>
                        </a>
                     </li> 
                  <li class="nav-item">
                        <a class="nav-link" href="admin/comment">
                          <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
                          <span class="menu-title">Bình luận</span>
                        </a>
                    </li>       
                  <li class="nav-item">
                        <a class="nav-link" href="admin/setting">
                          <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
                          <span class="menu-title">Cài đặt</span>
                        </a>
                          
                    </li>

                </ul>
            </nav>