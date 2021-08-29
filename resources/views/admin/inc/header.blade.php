<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row navbar-info">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="index.html"><img src="admin/images/logo.svg" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="admin/images/logo-mini.svg" alt="logo"/></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
            </button>
                    <ul class="navbar-nav navbar-nav-right">
                        
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                              <img src="admin/images/faces/face5.jpg" alt="profile"/>
                            </a>
                              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                                <a class="dropdown-item">
                                <i class="mdi mdi-settings text-primary"></i>
                                <span>{{$user_login->name}}</span>
                              </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="admin/logout" class="dropdown-item">
                                <i class="mdi mdi-logout text-primary"></i>
                                Logout
                              </a>
                            </div>
                        </li>
                        <li class="nav-item nav-settings d-none d-lg-block">
                            <a class="nav-link" href="javascript:void(0)">
                              <i class="mdi mdi-apps"></i>
                            </a>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
                </div>
        </nav>