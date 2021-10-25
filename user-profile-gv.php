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
                <div class="row">
                    
                    <div class="col-md-4 mess">
                        <a href="#"><i class="fab fa-facebook-messenger" style="font-size: 38px;"></i></a>

                    </div>
                    <div class="dropdown text-end  col-md-5">
                        
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="images/ava.png" alt="mdo" width="42" height="42" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small text-light" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#">Cài đặt</a></li>
                            <li><a class="dropdown-item" href="#">Tài khoản</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
                        </ul>
                    
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- profile -->
    <div class="container rounded-3 bg-white mt-4 mb-5 my-3 col-md-8">
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
                            <input type="text" class="form-control" placeholder="enter phone number" value="" readonly="readonly">
                        </div>
                        <div class="col-md-12 mt-2">
                            <label class="labels">Địa chỉ</label>
                            <input type="text" class="form-control" placeholder="enter address line 1" value=""readonly="readonly">
                        </div>
                        <div class="col-md-12 mt-2">
                            <label class="labels">Email</label>
                            <input type="text" class="form-control" placeholder="enter email id" value=""readonly="readonly">
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
                    <!-- Button trigger modal -->
                    <div class="mt-4 text-center">
                        <button type="button" class="btn" style="background: #663399; color:#fff;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Sửa thông tin
                        </button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa thông tin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <!-- avatar -->
                    <div class="col-md-4 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
                        <form action="update-profile.php" method="POST" enctype="multipart/form-data" id="form_avatar">
                            <div class="row justify-content-center align-items-center w-100 m-auto rounded" style="background-color:#e4e4e4;">
                                <div class="col-8 ps-4" style="font-weight: 500; color: #223035; font-size:16px; line-height: 16px;"> Chọn ảnh đại diện:</div>
                                <div class="col-4 file-upload">
                                    <input type="file" name="file_image" />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary mt-2 btn-rounded rounded-pill w-100" data-mdb-ripple-color="dark" name = "submit">Cập nhật ảnh</button>
                        </form>
                    </div>

                    <!-- sửa thông tin -->
                    <div class="col-md-7 border-right">
                        <div class="p-3 py-3">
                            <div class="justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Sửa thông tin tài khoản</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12"><label class="labels">Họ và tên</label><input type="text" class="form-control" placeholder="first name" value=""></div>
                                
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="labels">Số điện thoại</label>
                                    <input type="text" class="form-control" placeholder="09x xxx xxxx" value="">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Địa chỉ</label>
                                    <input type="text" class="form-control" placeholder="xã,phường/huyện/tỉnh" value="">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Email</label>
                                    <input type="text" class="form-control" placeholder="abc@gmail.com" value="">
                                </div>
                                
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="labels">Ngày sinh</label>
                                    <input type="date" class="form-control" placeholder="date" value="">
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Giới tính</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Chọn giới tính</option>
                                        <option value="1">Nam</option>
                                        <option value="2">Nữ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn"style="background: #6600CC; color:#fff;" >Lưu thay đổi</button>
            </div>
            </div>
        </div>
    </div>

</div>


<?php include("template/footer.php"); ?>
