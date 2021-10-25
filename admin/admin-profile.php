<?php include("template/header.php"); ?>

<div class='dashboard'>
    <?php include("template/admin.php");?>

    <!-- bảng -->
    <div class='dashboard-app'>
        <div class='dashboard-toolbar row'>
            <div class="col-5"><a href="#!" class="menu-toggle "><i class="fas fa-bars"></i></a></div>
            <div class="row height d-flex justify-content-center align-items-center col-7">
                <div class="form"> 
                    <i class="fa fa-search"></i> <input type="text" class="form-control form-input" placeholder="Tìm kiếm mọi thứ..."> <span class="left-pan"><i class="fa fa-microphone"></i></span> 
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
                    <div class='card-body shadow p-3 mb-5 bg-white rounded'>    
                        <div class="container rounded bg-white mt-2">
                            <div class="row">
                                <div class="col-md-3 border-right">
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
                                </div>
                                <div class="col-md-5 border-right">
                                    <div class="p-3 py-5">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="text-right">Profile Settings</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4"><h6 class="mb-0">Họ và tên</h6> </div>
                                            <div class="col-sm-8 text-secondary">
                                                Ánh
                                            </div>
                                        </div>
                                        <hr>
                                            
                                        <div class="row">
                                            <div class="col-sm-4"><h6 class="mb-0">Địa chỉ</h6></div>
                                            <div class="col-sm-8 text-secondary">
                                                Tb
                                            </div>
                                        </div>
                                        <hr>
                                            
                                        <div class="row">
                                            <div class="col-sm-4"><h6 class="mb-0">Số điện thoại</h6></div>
                                            <div class="col-sm-8 text-secondary">
                                                098765
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-sm-4"><h6 class="mb-0">Giới tính</h6></div>
                                            <div class="col-sm-8 text-secondary">
                                                Nữ
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-sm-4"><h6 class="mb-0">Ngày sinh</h6></div>
                                            <div class="col-sm-8 text-secondary">
                                                098765
                                            </div>
                                        </div>
                                        <hr>
                                      
                                        <!-- Button trigger modal -->
                                        <div class="mt-5 text-center">
                                            <button type="button" class="btn" style="background: #663399; color:#fff;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Sửa thông tin
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div class="p-3 py-5">
                                        <div class="d-flex justify-content-between align-items-center experience"><span>Kinh nghiệm</span></div><br>
                                        <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                                        <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
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
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("template/footer.php"); ?>

<!-- đoạn xử lý menu toogle -->
<script src="JS/admin.js"></script>