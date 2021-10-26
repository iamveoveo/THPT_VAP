<?php include("template/header.php"); ?>

<div class='dashboard'>
    <?php include("template/admin.php");?>

    <!-- bảng -->
    <div class='dashboard-app'>
        <div class='dashboard-toolbar row'>
            <div class="col-5"><a href="#!" class="menu-toggle "><i class="fas fa-bars"></i></a></div>
            <div class="row height d-flex justify-content-center align-items-center col-7">
                <div class="form form-search"> 
                    <i class="fa fa-search"></i> <input type="text" class="form-control form-input rounded" placeholder="Tìm kiếm mọi thứ..."> <span class="left-pan"><i class="fa fa-microphone"></i></span> 
                </div>
            </div>
        </div
        >
        
        <div class='dashboard-content'>
            <div class='container'>
                <div class='card'>
                    <div class='card-header'>
                        <h2>Quản lý tài khoản</h2>
                    </div>

                    <!-- profile -->
                    <!-- about: level này bạn có thể chỉnh sửa những gì -->
                    <div class='card-body shadow p-3 mb-5 bg-white rounded'>    
                        <div class="container rounded bg-white mt-2">
                            <div class="container">
                                <div class="row gutters">
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                        <div class="card h-100 card-col">
                                            <div class="card-body">
                                                <div class="account-settings">
                                                    <div class="user-profile">
                                                        <div class="user-avatar">
                                                            <img src="../images/ava.png" alt="Maxwell Admin">
                                                        </div>
                                                        <h5 class="user-name">Yuki Hayashi</h5>
                                                        <h6 class="user-email">yuki@Maxwell.com</h6>
                                                    </div>
                                                    <div class="about">
                                                        <h5 class="mb-2 text-primary">About</h5>
                                                        <p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and human experiences.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                        <div class="card card-col h-100">
                                            <div class="card-body">
                                                <div class="row gutters">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <h6 class="mb-3 text-primary">Personal Details</h6>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                        <div class="form-group">
                                                            <label for="fullName">Họ và tên</label>
                                                            <input type="text" class="form-control" id="fullName" placeholder="Enter full name">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                        <div class="form-group">
                                                            <label for="eMail">Email</label>
                                                            <input type="email" class="form-control" id="eMail" placeholder="Enter email ID">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                        <div class="form-group">
                                                            <label for="phone">Số điện thoại</label>
                                                            <input type="tel" class="form-control" id="phone" placeholder="Enter phone number">
                                                        </div>
                                                    </div>
                                                     <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                        <div class="form-group">
                                                            <label for="Street">Địa chỉ</label>
                                                            <input type="name" class="form-control" id="Street" placeholder="Enter Street">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                        <div class="form-group">
                                                            <label for="website">Ngày sinh</label>
                                                            <input type="date" class="form-control" id="website" placeholder="Website url">
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                        <label class="labels">Giới tính</label>
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option selected>Chọn giới tính</option>
                                                            <option value="1">Nam</option>
                                                            <option value="2">Nữ</option>
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row gutters">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                                                        <div class="text-right">
                                                            <button type="button" id="submit" name="submit" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Sửa thông tin</button>
                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                    <div class="row gutters">
                                        <!-- avtar -->
                                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                            <div class="card h-100 card-col">
                                                <div class="card-body">
                                                    <div class="account-settings">
                                                        <div class="user-profile">
                                                            <div class="user-avatar">
                                                                <img src="../images/ava.png" alt="Maxwell Admin">
                                                            </div>
                                                            <h5 class="user-name">Yuki Hayashi</h5>
                                                            <h6 class="user-email">yuki@Maxwell.com</h6>
                                                        </div>

                                                        <!-- edit avtar -->
                                                        <form action="" method="POST" enctype="multipart/form-data" id="form_avatar">
                                                            <div class="row justify-content-center align-items-center w-100 m-auto rounded" style="background-color:#e4e4e4;">
                                                                <div class="col-8 ps-4" style="font-weight: 500; color: #223035;"> Chọn ảnh đại diện:</div>
                                                                <div class="col-4 file-upload">
                                                                    <input type="file" name="file_image" />
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-outline-primary mt-2 btn-rounded rounded-pill w-100" data-mdb-ripple-color="dark" name = "submit">Cập nhật ảnh</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- edit -->
                                        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                            <div class="card card-col h-100">
                                                <div class="card-body">
                                                    <div class="row gutters">
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                            <h6 class="mb-3 text-primary fs-5 text">Thông tin tài khoản</h6>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                            <div class="form-group">
                                                                <label for="fullName">Họ và tên</label>
                                                                <input type="text" class="form-control" id="fullName" >
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                            <div class="form-group">
                                                                <label for="eMail">Email</label>
                                                                <input type="email" class="form-control" id="eMail" placeholder="acb@gmail.com">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                            <div class="form-group">
                                                                <label for="phone">Số điện thoại</label>
                                                                <input type="tel" class="form-control" id="phone" placeholder="09x xxx xxxx">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                            <div class="form-group">
                                                                <label for="Street">Địa chỉ</label>
                                                                <input type="name" class="form-control" id="Street" placeholder="Xã,phường/huyện/tỉnh">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                                                            <div class="form-group">
                                                                <label for="website">Ngày sinh</label>
                                                                <input type="date" class="form-control" id="website" >
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
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
                                    <div class="modal-footer ">
                                        <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Hủy</button>
                                        <button type="button" class="btn"style="background: #6600CC; color:#fff;" >Lưu thay đổi</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("template/footer.php"); ?>

<!-- đoạn xử lý menu toogle -->
<script src="JS/admin.js"></script>