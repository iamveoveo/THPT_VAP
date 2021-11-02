<?php
    /* include("login-check.php"); */
?>
<div class="dashboard-nav">
        <!-- logo -->
        <header>
            <a href="#" class="menu-toggle"><i class="fas fa-bars"></i> </a>
            <a href="#" class="brand-logo "><i class="fas fa-school"></i> <span>Trường THPT Chu văn An</span></a>
        </header>
        
        <!-- avtar -->
        <div class="avatar_admin ">
            <img src="../images/avatar/ava.png" alt="" id="avatar-admin" margin="auto" width="85px" height="85px" alt="user avatar">
        </div>

        <!-- navbar -->
        <nav class="dashboard-nav-list">
            <a href="index.php" class="dashboard-nav-item"><i class="fas fa-home"></i>Trang chủ </a>
            <div class='dashboard-nav-dropdown'><a href="admin-manager.php" class="dashboard-nav-item "><i class="fas fa-tasks"></i> Quản lý admin </a></div>
            <div class='dashboard-nav-dropdown'><a href="admin-qld.php" class="dashboard-nav-item "><i class="fas fa-tasks"></i> Quản lý điểm </a></div>
            <div class='dashboard-nav-dropdown'><a href="admin-qll.php" class="dashboard-nav-item "><i class="fas fa-tasks"></i> Quản lý lớp </a></div>
           
            <div class='dashboard-nav-dropdown'><a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fas fa-tasks"></i> Quản lý người dùng </a>
                <div class='dashboard-nav-dropdown-menu'>
                    <a href="admin-qlgv.php" class="dashboard-nav-dropdown-item">Quản lý Giáo viên</a>
                    <a href="admin-qlhs.php" class="dashboard-nav-dropdown-item">Quản lý học sinh</a>
                    <a href="admin-qlph.php" class="dashboard-nav-dropdown-item">Quản lý phụ huynh</a>
                </div>
            </div>
        
            <a href="admin-profile.php" class="dashboard-nav-item"><i class="fas fa-user"></i> Tài khoản </a>
          <div class="nav-item-divider"></div>
          <a href="admin-logout.php" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Đăng xuất </a>
        </nav>
    </div>