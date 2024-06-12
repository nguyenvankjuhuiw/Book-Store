<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Tìm kiếm" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2" style="height: calc(100% - 74px)">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?=ADMIN_URL?>/books/list.php" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>Quản lý sách</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=ADMIN_URL?>/genre/list.php" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>Quản lý thể loại</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=ADMIN_URL?>/users/list.php" class="nav-link">
                        <i class="nav-icon fas fa-print"></i>
                        <p>Quản lý người dùng</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=ADMIN_URL?>/thongke.php" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Thống kê sản phẩm bán chạy</p>
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="<?=ADMIN_URL?>/revenue/list.php" class="nav-link">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>Thống kê doanh thu</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=ADMIN_URL?>/profile.php" class="nav-link">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>Thay đổi thông tin cá nhân</p>
                    </a>
                </li>
            </ul>
        </nav> 
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>