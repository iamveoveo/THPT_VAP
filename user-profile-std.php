<?php include("template/header.php"); ?>

<div class="back">
    
    <header class="p-3 mb-3 border-bottom " style="background:rgb(87, 24, 155)">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <!-- logo -->
                <a class="navbar-brand" href="#">
                    <img src="images/logo.jpg" class="logo-header d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 link-secondary text-light fs-5 text">Trang chủ</a></li>
                    <li><a href="#" class="nav-link px-2 link-dark text-light fs-5 text">Phản hồi</a></li>
                    <li><a href="#" class="nav-link px-2 link-dark text-light fs-5 text">Thông báo </a></li>
                    <li><a href="#" class="nav-link px-2 link-dark text-light fs-5 text">Thành tích</a></li>
                </ul>

                <div class="dropdown text-end text-light">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="images/ava.png" alt="mdo" width="35" height="35" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Cài đặt</a></li>
                        <li><a class="dropdown-item" href="#">Tài khoản</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <!-- profile -->
    <div class="container rounded-3 bg-white mt-5 mb-5 my-3 col-md-8">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="images/ava.png"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span>
                </div>
            </div>
            <div class="col-md-6 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Thông tin tài khoản</h4>
                    </div>
                   
                    <div class="row mt-3">
                        <div class="col-md-12 mt-2 ">
                            <label class="labels">Họ và tên</label>
                            <input type="text" class="form-control" placeholder="first name" value="" readonly="readonly">
                        </div>
                        <div class="col-md-12 mt-2">
                            <label class="labels">Số điện thoại</label>
                            <input type="text" class="form-control" placeholder="enter phone number" value="">
                        </div>
                        <div class="col-md-12 mt-2">
                            <label class="labels">Địa chỉ</label>
                            <input type="text" class="form-control" placeholder="enter address line 1" value="">
                        </div>
                        <div class="col-md-12 mt-2">
                            <label class="labels">Email</label>
                            <input type="text" class="form-control" placeholder="enter email id" value="">
                        </div>
                       
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">Giới tính</label>
                            <input type="text" class="form-control" placeholder="country" value="" readonly="readonly">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Ngày sinh</label>
                            <input type="date" class="form-control" value="" placeholder="state" readonly="readonly">
                        </div>
                    </div>
                   
                </div>
            </div>
            
        </div>
    </div>

</div>


<?php include("template/footer.php"); ?>
